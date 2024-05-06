<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\Product;
use App\Models\Administrator\ProductCategories;
use App\Models\Administrator\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        $address = 'administrator/product/index';
        return view('administrator.dashboard.base-index', compact('address', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategories::all();
       
        $address = 'administrator/product/create';
        return view('administrator.dashboard.base-index', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // for create informations
        $count = 0;
        foreach ($request->infoTitle as $title) {

            if ($request->infoDesc[$count]) {

                $informations[$title] = $request->infoDesc[$count++];
            }
        }
        // for create informations

        $result = Product::create(
            [
                'title' => $request->title,
                'code' => $request->code,
                'informations' => json_encode($informations),
                'details' => $request->details,
                'description' => $request->description,
                'price' => $request->price,
                'price_off' => $request->price_off,
                'operator' => Auth::user()->id,
                'extra' => 'empty',
                'status' => 'disable',

            ]
        );

       

        $images = $request->file('image');
    
        $productImages = new ProductImages();
        $productCategories = new ProductCategories();

        if ($result) {
            $productImages->insertImages($result->id, $images);
            $productCategories->insertCategories($result->id, $request->category);
        }
       
        return redirect()->route('product.index');
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
        $product = Product::findOrFail($id);

        if ($product)

            $product->update(
                [
                    'status' => 'deleted',
                ]
            );

        return redirect()->route('product.index');
    }
}
