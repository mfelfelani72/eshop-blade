<?php

namespace App\Http\Controllers\Shop\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop\admin\ProductFeatured;
use Illuminate\Http\Request;

class ProductFeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $productsFeatureds = ProductFeatured::all();

        $address = 'administrator/product-featured/index';
        return view('administrator.dashboard.base-index', compact('address', 'productsFeatureds'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $primaryFeatured = ProductFeatured::findOrFail($id);

        $primaryFeatured->destroy($id);
        return redirect()->route('featured.index');
    }
}
