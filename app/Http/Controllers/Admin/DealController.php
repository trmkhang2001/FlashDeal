<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Deal;
use App\Models\DealStore;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index(Request $request)
    {
        $query = Deal::with(['category', 'store']);

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")
                    ->orWhere('slug', 'like', "%$keyword%");
            });
        }

        $deals = $query->latest()->paginate(10);

        return view('admin.deals.index', compact('deals'));
    }

    public function create()
    {
        $categories = Category::all();
        $stores = DealStore::approved()->get();
        return view('admin.deals.create', compact('categories', 'stores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'nullable|string|unique:deals,slug',
            'category_id' => 'nullable|exists:categories,id',
            'store_id' => 'nullable|exists:deal_stores,id',
            'original_price' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'url' => 'nullable|url',
            'image' => 'nullable|image',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'color' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'is_approved' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('deals', 'public');
        }

        $data['is_approved'] = $request->has('is_approved');
        $data['slug'] = $data['slug'] ?? \Str::slug($data['name']);

        Deal::create($data);
        return redirect()->route('deals.index')->with('success', 'Thêm deal thành công');
    }

    public function edit(Deal $deal)
    {
        $categories = Category::all();
        $stores = DealStore::approved()->get();
        return view('admin.deals.edit', compact('deal', 'categories', 'stores'));
    }

    public function update(Request $request, Deal $deal)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'nullable|string|unique:deals,slug,' . $deal->id,
            'category_id' => 'nullable|exists:categories,id',
            'store_id' => 'nullable|exists:deal_stores,id',
            'original_price' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'url' => 'nullable|url',
            'image' => 'nullable|image',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'color' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'is_approved' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('deals', 'public');
        }

        $data['is_approved'] = $request->has('is_approved');
        $data['slug'] = $data['slug'] ?? \Str::slug($data['name']);

        $deal->update($data);
        return redirect()->route('deals.index')->with('success', 'Cập nhật deal thành công');
    }

    public function destroy(Deal $deal)
    {
        $deal->delete();
        return redirect()->route('deals.index')->with('success', 'Xóa deal thành công');
    }
}
