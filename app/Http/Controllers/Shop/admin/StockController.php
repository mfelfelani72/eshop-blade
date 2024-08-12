<?php

namespace App\Http\Controllers\Shop\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop\admin\Product;
use App\Models\Shop\admin\Stock;
use App\Models\Shop\admin\StockTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    public function editStock(string $id)
    {
        // dd($id);
        $product = Product::findOrFail($id);

        $address = 'shop/admin/stock/edit-stock';
        return view('administrator.dashboard.base-index', compact('address', 'product'));
    }

    public function storeStock(Request $request, string $id)
    {

        // dd($id);
        // dd($request);

        Validator::make($request->all(), [
            'count' => 'required',
            'details' => 'required',
        ], [
            'count.required' => __('dashboard.count') . __('dashboard.is-required'),
            'details.required' => __('dashboard.details') . __('dashboard.is-required'),
        ])
            ->validate();

        $result = StockTransaction::create([
            'product_id' => $id,
            'operator_id' => Auth::user()->id,
            'type' => $request->type,
            'count' => $request->count,
            'details' => $request->details,
            'extra' => 'empty',
        ]);

        if ($result) {
            $count = Stock::calculate($id);

            $stock = Stock::where('product_id', $id)->first();

            if ($stock) {
                $stock->update([
                    'count' => $count
                ]);
                
            } else {
                $result = Stock::create([
                    'product_id' => $id,
                    'count' => $count,
                    'extra' => 'empty',
                ]);
            }
        }


        return redirect()->route('product.index');
    }
}
