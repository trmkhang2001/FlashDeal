<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DealStore;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(?string $slug = null)
    {
        // Không có slug => về home
        if (empty($slug)) {
            return redirect()->route('home');
        }

        // Tìm DealStore theo slug + eager load Offer đã duyệt
        $deal = DealStore::with([
            'offers' => function ($q) {
                $q->where('is_approved', 1);
                $q->orderByDesc('id');
            },
            'deals' => function ($q) {
                $q->where('is_approved', 1);
                $q->orderByDesc('id');
            }
        ])
            ->where('slug', $slug)
            ->where('is_approved', 1) // store phải duyệt
            ->first();

        // Không thấy => về home (hoặc 404)
        if (!$deal) {
            return redirect()->route('home')
                ->with('error', 'Deal không tồn tại hoặc chưa được duyệt.');
            // hoặc: abort(404);
        }

        // Trả view & truyền dữ liệu
        // Bạn có thể lấy $deal->offers trong Blade, nên không bắt buộc truyền riêng
        return view('view', [
            'deal'   => $deal,
            'offers' => $deal->offers,
            'deals'  => $deal->deals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
