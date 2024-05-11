<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();

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
        Categories::create(
            [
                'title' => $request->title,
                'code' => $request->code,
                'description' => $request->description,
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
