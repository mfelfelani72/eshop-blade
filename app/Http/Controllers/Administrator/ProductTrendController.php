<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\ProductTrend;
use Illuminate\Http\Request;

class ProductTrendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $productsTrends = ProductTrend::all();

        $address = 'administrator/product-trend/index';
        return view('administrator.dashboard.base-index', compact('address', 'productsTrends'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $primaryTrend = ProductTrend::findOrFail($id);

        $primaryTrend->destroy($id);
        return redirect()->route('trend.index');
    }
}
