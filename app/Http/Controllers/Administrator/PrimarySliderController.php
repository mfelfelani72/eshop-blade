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
        $primarySlider = PrimarySlider::all();
        dd($primarySlider->link-title);
        $address = 'administrator/primarySlider/index';
        return view('administrator.dashboard.base-index', compact('address','primarySlider'));
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
        //
    }
}
