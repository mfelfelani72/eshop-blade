<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function addToCart(Request $request): JsonResponse
    {

        // dd("hiewr");
        // dd($request->message);
        return response()->json(['success' => $request->message]);
    }
}

