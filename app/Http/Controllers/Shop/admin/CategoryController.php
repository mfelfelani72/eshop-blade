<?php

namespace App\Http\Controllers\Shop\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop\admin\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::Active()->get();

        $address = 'administrator/category/index';
        return view('administrator.dashboard.base-index', compact('address', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $address = 'administrator/category/create';
        return view('administrator.dashboard.base-index', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'required',
            // 'description' => 'required',
        ], [
            'title.required' => __('dashboard.title') . __('dashboard.is-required'),
            'code.required' => __('dashboard.code') . __('dashboard.is-required'),
            'description.required' => __('dashboard.description') . __('dashboard.is-required'),
        ])
            ->validate();

        Categories::create(
            [
                'title' => $request->title,
                'code' => $request->code,
                // 'description' => $request->description,
                'description' => 'empty',
                'operator' => Auth::user()->id,
                'extra' => 'empty',
                'status' => 'enable',
            ]
        );

        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categories::findOrFail($id);

        $address = 'administrator/category/edit';
        return view('administrator.dashboard.base-index', compact('address', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Categories::findOrFail($id);
        
        $category->update(
            [
                'title' => $request->title,
                'code' => $request->code,
                'description' => $request->description,
                'operator' => Auth::user()->id,
                'extra' => $category->extra,
                'status' => $category->status,
            ]
        );

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::findOrFail($id);

        if ($category)

            $category->update(
                [
                    'status' => 'deleted',
                ]
            );

        return redirect()->route('category.index');
    }
}
