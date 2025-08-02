<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\DealStore;
use App\Models\Offer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Header data composer
        View::composer(['layouts.app', 'layouts.partials.header'], function ($view) {

            $headerCategories = Cache::remember('header_categories', 3600, function () {
                return Category::select('id', 'name', 'slug')
                    ->orderBy('name')
                    ->get();
            });

            $headerStores = Cache::remember('header_stores', 3600, function () {
                return DealStore::approved()
                    ->select('id', 'name', 'slug')
                    ->orderBy('name')     // hoặc popular ->orderBy('clicks','desc')
                    ->limit(10)
                    ->get();
            });

            $headerOffers = Cache::remember('header_offers', 600, function () {
                return Offer::approved()
                    ->select('id', 'offer', 'code', 'url')
                    ->latest('updated_at') // hoặc 'created_at'
                    ->limit(10)
                    ->get();
            });

            $view->with(compact('headerCategories', 'headerStores', 'headerOffers'));
        });
    }
}
