<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\PrimarySlider;
use Illuminate\Http\Request;

class PrimarySliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $primarySliders = PrimarySlider::all();
        $address = 'administrator/primarySlider/index';
        return view('administrator.dashboard.base-index', compact('address','primarySliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $primarySlider = PrimarySlider::findOrFail($id);
        $address = 'administrator/primarySlider/edit';
        return view('administrator.dashboard.base-index', compact('address', 'primarySlider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        dd($request->title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
