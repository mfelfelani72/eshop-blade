<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\PrimaryBanner;
use Illuminate\Http\Request;

class PrimaryBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $primaryBanners = PrimaryBanner::all();
        $address = 'administrator/primaryBanner/index';
        return view('administrator.dashboard.base-index', compact('address', 'primaryBanners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $address = 'administrator/primaryBanner/create';
        return view('administrator.dashboard.base-index', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $img = "";

        if (!empty($file)) {
            $img = time() . "." . $file->getClientOriginalExtension();
            $file->move('front/img/banner', $img);
        }

        PrimaryBanner::create(
            [
                'title' => $request->title,
                'slogan' => $request->slogan,
                'category' => $request->category,
                'link_title' => $request->link_title,
                'link' => $request->link,
                'description' => $request->description,
                'extra' => 'empty',
                'img' => $img,
            ]
        );

        return redirect()->route('primary-banner.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $primaryBanner = PrimaryBanner::findOrFail($id);
        $address = 'administrator/primaryBanner/edit';
        return view('administrator.dashboard.base-index', compact('address', 'primaryBanner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $primaryBanner = PrimaryBanner::findOrFail($id);
        $file = $request->file('image');
        $img = "";

        if (!empty($file)) {
            if (file_exists('front/img/banner/' . $primaryBanner->img)) {
                unlink('front/img/banner/' . $primaryBanner->img);
            }
            $img = time() . "." . $file->getClientOriginalExtension();
            $file->move('front/img/banner', $img);
        } else {
            $img = $primaryBanner->img;
        }

        $primaryBanner->update([

            'title' => $request->title,
            'slogan' => $request->slogan,
            'category' => $request->category,
            'link_title' => $request->link_title,
            'link' => $request->link,
            'description' => $request->description,
            'img' => $img,

        ]);

        return redirect()->route('primary-banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $primaryBanner = PrimaryBanner::findOrFail($id);

        $primaryBanner->destroy($id);
        return redirect()->route('primary-banner.index');
    }
}
