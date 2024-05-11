<?php

use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\PrimaryBannerController;
use App\Http\Controllers\Administrator\PrimarySliderController;
use App\Http\Controllers\Administrator\ProductController;
use App\Http\Controllers\Front\FrontController;

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

    Route::resource('/admin/dashboard/product', ProductController::class)->parameters(['product' => 'id']);

    Route::resource('/admin/dashboard/category', CategoryController::class)->parameters(['category' => 'id']);
    
    // settings

});
