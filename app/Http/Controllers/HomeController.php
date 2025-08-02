<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Deal;
use App\Models\DealStore;
use App\Models\Offer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // 8 DealStore mới nhất, đã duyệt
        $latestStores = DealStore::query()
            ->where('is_approved', 1)     // bỏ nếu muốn hiện tất cả
            ->latest('created_at')        // hoặc ->orderByDesc('id')
            ->take(8)
            ->get();

        // 10 Offer mới nhất, đã duyệt + eager load store
        $latestOffers = Offer::query()
            ->where('is_approved', 1)
            ->latest('created_at')
            ->with([
                'store:id,name,slug,image', // chọn cột cần dùng
            ])
            ->take(10)
            ->get();
        $latestDeals = Deal::query()
            ->where('is_approved', 1)
            ->latest('created_at')
            ->with([
                'store:id,name,slug,image',
            ])
            ->take(10)
            ->get();
        $headerCategories = Category::query()
            ->get();
        return view('home', compact('latestStores', 'latestOffers', 'latestDeals', 'headerCategories'));
    }
    public function terms_conditions()
    {
        return view('terms');
    }
    public function privacy_policy()
    {
        return view('privacy');
    }
}