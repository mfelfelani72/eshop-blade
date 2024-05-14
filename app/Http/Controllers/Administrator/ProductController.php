<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\Categories;
use App\Models\Administrator\Product;
use App\Models\Administrator\ProductCategories;
use App\Models\Administrator\ProductFeatured;
use App\Models\Administrator\ProductImages;
use App\Models\Administrator\ProductTrend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $informations = [];
        foreach ($request->infoTitle as $title) {

            if ($request->infoDesc[$count]) {

                $informations[$title] = $request->infoDesc[$count++];
            }
        }
        // for create informations

        // validate 

        Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'required',
            // 'informations' => 'required',
            'details' => 'required',
            'description' => 'required',
            'price' => 'required',
            'price_off' => 'required',
            'image' => 'required',

        ], [
            'title.required' => __('dashboard.title') . __('dashboard.is-required'),
            'code.required' => __('dashboard.code') . __('dashboard.is-required'),
            'informations.required' => __('dashboard.informations') . __('dashboard.is-required'),
            'specialtie.required' => __('dashboard.specialtie') . __('dashboard.is-required'),
            'details.required' => __('dashboard.details') . __('dashboard.is-required'),
            'description.required' => __('dashboard.description') . __('dashboard.is-required'),
            'price.required' => __('dashboard.price') . __('dashboard.is-required'),
            'price_off.required' => __('dashboard.price_off') . __('dashboard.is-required'),
            'image.required' => __('dashboard.image') . __('dashboard.is-required'),
        ])
            ->validate();

        // validate 

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
            if (!empty($request->category))
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


        $productCategoriesIds = [];
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
            if (!empty($request->category))
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
    /**
     * Add to trend product list.
     */
    public function trend(string $id)
    {
        $productTrend = ProductTrend::where('product_id', $id)->first();

        if (empty($productTrend))
            ProductTrend::create(
                [
                    'product_id' => $id,
                    'code' => 'empty',
                    'description' => 'empty',
                    'operator' => Auth::user()->id,
                    'extra' => 'empty',
                    'status' => 'enable'
                ]
            );

        return redirect()->route('product.index');
    }
    /**
     * Add to featured product list.
     */
    public function featured(string $id)
    {

        $productFeatured = ProductFeatured::where('product_id', $id)->first();

        if (empty($productFeatured))

            ProductFeatured::create(
                [
                    'product_id' => $id,
                    'code' => 'empty',
                    'time' => now(),
                    'description' => 'empty',
                    'operator' => Auth::user()->id,
                    'extra' => 'empty',
                    'status' => 'enable'
                ]
            );

        return redirect()->route('product.index');
    }
}
