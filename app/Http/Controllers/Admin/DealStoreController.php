<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DealStore;
use Illuminate\Http\Request;

class DealStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DealStore::with('category');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")
                    ->orWhere('slug', 'like', "%$keyword%");
            });
        }

        $stores = $query->latest()->paginate(10);

        return view('admin.deal-store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.deal-store.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:deal_stores,slug',
            'category_id' => 'nullable|exists:categories,id',
            'events' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
            'about_store' => 'nullable|string',
            'how_to_apply' => 'nullable|string',
            'faqs' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_approved' => 'nullable|boolean',
        ]);

        // Slug nếu không nhập sẽ tự tạo từ name
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('deal-stores', 'public');
            $validated['image'] = $path;
        }

        $validated['is_approved'] = $request->has('is_approved');

        DealStore::create($validated);

        return redirect()->route('deal-stores.index')->with('success', 'Tạo Deal Store thành công!');
    }

    public function edit(DealStore $deal_store)
    {
        $categories = Category::all();
        return view('admin.deal-store.form', [
            'deal_store' => $deal_store,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, DealStore $dealStore)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:deal_stores,slug,' . $dealStore->id,
            'category_id' => 'nullable|exists:categories,id',
            'events' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
            'about_store' => 'nullable|string',
            'how_to_apply' => 'nullable|string',
            'faqs' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_approved' => 'nullable|boolean',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        if ($request->hasFile('image')) {
            // Optionally: delete old image here
            $path = $request->file('image')->store('deal-stores', 'public');
            $validated['image'] = $path;
        }

        $validated['is_approved'] = $request->has('is_approved');

        $dealStore->update($validated);

        return redirect()->route('deal-stores.index')->with('success', 'Cập nhật Deal Store thành công!');
    }

    public function destroy(DealStore $deal_store)
    {
        $deal_store->delete();
        return back()->with('success', 'Đã xóa thành công!');
    }
}
