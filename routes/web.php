<?php

use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\PrimaryBannerController;
use App\Http\Controllers\Administrator\PrimarySliderController;
use App\Http\Controllers\Administrator\ProductController;
use App\Http\Controllers\Administrator\ProductFeaturedController;
use App\Http\Controllers\Administrator\ProductTrendController;
use App\Http\Controllers\Front\FrontController;
use App\Models\Administrator\ProductFeatured;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front');

Route::get('/lang/{locale}', function ($locale) {

    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('lang');

Route::middleware(['App\Http\Middleware\Administrator'])->group(function () {

    Auth::routes();

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // settings

    Route::resource('/admin/dashboard/settings/primary-slider', PrimarySliderController::class)->parameters(['primary-slider' => 'id']);

    Route::resource('/admin/dashboard/settings/primary-banner', PrimaryBannerController::class)->parameters(['primary-banner' => 'id']);

    Route::resource('/admin/dashboard/shop/product', ProductController::class)->parameters(['product' => 'id']);

    Route::put('/admin/dashboard/shop/product/trend/{id}', [ProductController::class, 'trend'])->name('trend');

    Route::put('/admin/dashboard/shop/product/featured/{id}', [ProductController::class, 'featured'])->name('featured');

    Route::resource('/admin/dashboard/shop/category', CategoryController::class)->parameters(['category' => 'id']);

    Route::resource('/admin/dashboard/shop/trend', ProductTrendController::class)->parameters(['trend' => 'id']);

    Route::resource('/admin/dashboard/shop/featured', ProductFeaturedController::class)->parameters(['featured' => 'id']);
    
    // settings

});
