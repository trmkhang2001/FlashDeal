<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%$keyword%")
                    ->orWhere('slug', 'like', "%$keyword%");
            });
        }

        $news = $query->latest()->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.news.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'is_approved' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $data['is_approved'] = $request->has('is_approved');
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Tạo bài viết thành công');
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.form', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug,' . $news->id,
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'is_approved' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $data['is_approved'] = $request->has('is_approved');
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'Cập nhật bài viết thành công');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return back()->with('success', 'Đã xoá bài viết');
    }
}
