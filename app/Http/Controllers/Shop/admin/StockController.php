<?php

namespace App\Http\Controllers\Shop\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop\admin\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function increase(string $id)
    {
        // dd($id);

        $address = 'shop/admin/stock/increase';
        return view('administrator.dashboard.base-index', compact('address'));
    }
}
