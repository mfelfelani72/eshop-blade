<?php

namespace App\Http\Controllers\Shop\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop\admin\Product;
use App\Models\Shop\admin\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function editStock(string $id)
    {
        // dd($id);
        $product = Product::findOrFail($id);

        $address = 'shop/admin/stock/edit-stock';
        return view('administrator.dashboard.base-index', compact('address','product'));
    }

    public function storeStock(Request $request, string $id)
    {

        dd($request);

        return redirect()->route('product.index');
    }
}
