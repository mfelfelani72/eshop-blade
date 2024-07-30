<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\AssideMenu;
use Illuminate\Http\Request;

class AssideMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assideMenus = AssideMenu::all();
        $address = 'administrator/assideMenu/index';
        return view('administrator.dashboard.base-index', compact('address', 'assideMenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $address = 'administrator/assideMenu/create';
        return view('administrator.dashboard.base-index', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       dd($request);
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
