<?php

namespace App\Http\Controllers\Front\shop;

use App\Http\Controllers\Controller;
use App\Models\Administrator\AssideMenu;
use App\Models\Administrator\HeaderMenu;
use App\Models\Administrator\PrimaryBanner;
use App\Models\Administrator\ProductTrend;
use Illuminate\Http\Request;

class Productcontroller extends Controller
{
 
    // display page single product

    public function product(string $id) {

        $headerMenu = HeaderMenu::all()->sortBy('priority');
        $assideMenu = AssideMenu::all()->sortBy('priority');
        $productTrends = ProductTrend::all();
        $primaryBanners = PrimaryBanner::all();
        // dd($id);

        $address = 'front/shop/product';
        return view('front/shop.base-index', compact('address', 'headerMenu', 'productTrends', 'primaryBanners'));
    }
    
}
