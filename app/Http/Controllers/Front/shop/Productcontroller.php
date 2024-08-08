<?php

namespace App\Http\Controllers\Front\shop;

use App\Http\Controllers\Controller;
use App\Models\Administrator\AssideMenu;
use App\Models\Administrator\HeaderMenu;
use App\Models\Administrator\PrimaryBanner;
use App\Models\Administrator\Product;
use App\Models\Administrator\ProductFeatured;
use Illuminate\Http\Request;

class Productcontroller extends Controller
{
 
    // display page single product

    public function product(string $id) {

        $headerMenu = HeaderMenu::all()->sortBy('priority');
        $assideMenu = AssideMenu::all()->sortBy('priority');
        $productFeatured = ProductFeatured::all();
        $primaryBanners = PrimaryBanner::all();


        // dd($id);
        $product = Product::findOrFail($id);
       
        $address = 'front/shop/product';
        return view('front/shop.base-index', compact('address', 'headerMenu', 'productFeatured', 'primaryBanners','product'));
    }
    
}
