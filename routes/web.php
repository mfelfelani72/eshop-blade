<?php

use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


// Route::withoutMiddleware([Administrator::class])->group(function () {

Route::get('/', [FrontController::class, 'index'])->name('front');


Route::get('/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'fa'])) {
        // dd("sad");
        abort(400);
    }
    // dd($locale);
    app()->setLocale($locale);
    // dd(App::currentLocale());
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');

// });

// Route::middleware(['App\Http\Middleware\Administrator'])->group(function () {
//     // Your protected routes
// });
Route::middleware(['App\Http\Middleware\Administrator'])->group(function () {

    Auth::routes();
    // Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    // Route::redirect('/admin', '/login');

    

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    
    // Route::resource('admin/home', \App\Http\Controllers\Admin\HomeController::class)->parameters(['home' => 'id']);
    // Route::resource('admin/about', \App\Http\Controllers\Admin\AboutController::class)->parameters(['about' => 'id']);
    // Route::resource('admin/education', \App\Http\Controllers\Admin\EducationController::class)->parameters(['education' => 'id']);
    // Route::resource('admin/contact', \App\Http\Controllers\Admin\ContactController::class)->parameters(['contact' => 'id']);
    // Route::resource('admin/port-category', \App\Http\Controllers\Admin\PortCaregoryController::class)->parameters(['port-category' => 'id']);
});
