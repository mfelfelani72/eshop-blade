<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Models\Administrator\AssideMenu;
use App\Models\Administrator\HeaderMenu;
use App\Models\Administrator\PrimaryBanner;
use App\Models\Shop\admin\Product;
use App\Models\Shop\admin\ProductFeatured;
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
       
        $address = 'shop/product';
        return view('shop.base-index', compact('address', 'headerMenu', 'productFeatured', 'primaryBanners','product'));
    }
    
}
