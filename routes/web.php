<?php

use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\HeaderMenuController;
use App\Http\Controllers\Administrator\AssideMenuController;
use App\Http\Controllers\Administrator\PrimaryBannerController;
use App\Http\Controllers\Administrator\PrimarySliderController;

use App\Http\Controllers\Shop\admin\CategoryController;
use App\Http\Controllers\Shop\admin\ProductController;
use App\Http\Controllers\Shop\admin\ProductFeaturedController;
use App\Http\Controllers\Shop\admin\ProductTrendController;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front');

Route::get('/lang/{locale}', function ($locale) {

    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('lang');

// product pages

Route::get('/shop/product/{id}', [App\Http\Controllers\Shop\ProductController::class, 'product'])->name('show-product');

// product pages

Route::middleware(['App\Http\Middleware\Administrator'])->group(function () {

    Auth::routes();

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // settings

    Route::resource('/admin/dashboard/settings/header-menu', HeaderMenuController::class)->parameters(['header-menu' => 'id']);

    Route::resource('/admin/dashboard/settings/asside-menu', AssideMenuController::class)->parameters(['asside-menu' => 'id']);

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

Route::middleware(['App\Http\Middleware\RegisteredUsers'])->group(function () {

    // Route::get('/profile/{id}', [ProfileController::class, 'dashboard'])->name('front');
    Route::get('/profile/information', [ProfileController::class, 'information'])->name('user-information');
    Route::get('/profile/edit-information', [ProfileController::class, 'editInformation'])->name('user-edit-information');
    Route::put('/profile/store-information', [ProfileController::class, 'storeInformation'])->name('store-edit-information');

    Route::get('/profile/address', [ProfileController::class, 'address'])->name('user-address');
    Route::get('/profile/edit-address/{id}', [ProfileController::class, 'editAddress'])->name('user-edit-address');
    Route::put('/profile/store-address/{id}', [ProfileController::class, 'storeAddress'])->name('user-store-address');

    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('user-settings');
});
