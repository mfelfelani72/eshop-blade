<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\Categories;
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
        $products = Product::NotDelete()->get();

        $address = 'administrator/product/index';
        return view('administrator.dashboard.base-index', compact('address', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::Active()->get();

        $address = 'administrator/product/create';
        return view('administrator.dashboard.base-index', compact('address', 'categories'));
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

        $resultProduct = Product::create(
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

        if ($resultProduct) {
            $resultImage = $productImages->insertImages($resultProduct->id, $images);
            $resultProductCategories = $productCategories->insertCategories($resultProduct->id, $request->category);
        }

        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        $categories = Categories::Active()->get();

        // for selected categories for product
        $productCategories = ProductCategories::select(
            'category_id',
        )
            ->where('product_id', $product->id)->get()->toArray();

        if ($productCategories)
            foreach ($productCategories as $item)
                $productCategoriesIds[] = $item["category_id"];

        // for selected categories for product

        $address = 'administrator/product/edit';
        return view('administrator.dashboard.base-index', compact('address', 'product', 'categories', 'productCategoriesIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = Product::findOrFail($id);

        // for create informations
        $count = 0;
        foreach ($request->infoTitle as $title) {

            if ($request->infoDesc[$count]) {

                $informations[$title] = $request->infoDesc[$count++];
            }
        }
        // for create informations


        $resultProduct = $product->update(
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
                'status' => $product->status,

            ]
        );

        $images = $request->file('image');

        $productImages = new ProductImages();
        $productCategories = new ProductCategories();

        if ($resultProduct) {
            if ($request->changeImg)
                $resultImage = $productImages->insertImages($product->id, $images);
            
            $resultProductCategories = $productCategories->insertCategories($product->id, $request->category);
        }

        return redirect()->route('product.index');
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
