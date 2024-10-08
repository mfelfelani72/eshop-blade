<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Administrator\AssideMenu;
use App\Models\Administrator\HeaderMenu;
use App\Models\Administrator\PrimaryBanner;
use App\Models\Administrator\PrimarySlider;
use App\Models\Shop\admin\ProductFeatured;
use App\Models\Shop\admin\ProductTrend;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $headerMenu = HeaderMenu::all()->sortBy('priority');
        $assideMenu = AssideMenu::all()->sortBy('priority');

        // dd($assideMenu);

        $primarySliders = PrimarySlider::all();
        $primaryBanners = PrimaryBanner::all();
        $productTrends = ProductTrend::all();
        $productFeatured = ProductFeatured::all();



        $address = 'front/front/index';
        return view('front.front.base-index', compact('address', 'headerMenu', 'primarySliders', 'primaryBanners', 'productTrends', 'productFeatured', 'assideMenu'));
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
