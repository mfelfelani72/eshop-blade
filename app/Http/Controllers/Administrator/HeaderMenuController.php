<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\HeaderMenu;
use App\Models\Administrator\HeaderMenuChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HeaderMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headerMenus = HeaderMenu::all();
        $address = 'administrator/headerMenu/index';
        return view('administrator.dashboard.base-index', compact('address', 'headerMenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $address = 'administrator/headerMenu/create';
        return view('administrator.dashboard.base-index', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);

        $file = $request->file('image');
        $img = "";

        if (!empty($file)) {
            $img = time() . "." . $file->getClientOriginalExtension();
            $file->move('front/img/header-menu', $img);
        }

        Validator::make(['img' => $img], [
            'img' => 'required',
        ], [
            'img.required' => __('dashboard.image') . __('dashboard.is-required'),
        ])->validate();

        Validator::make($request->all(), [
            'title' => 'required',
            // 'link' => 'required',
            // 'lable' => 'required',

        ], [

            'title.required' => __('dashboard.title') . __('dashboard.is-required'),
            'link.required' => __('dashboard.link') . __('dashboard.is-required'),
            'lable.required' => __('dashboard.lable') . __('dashboard.is-required'),

        ])
            ->validate();

        $link = "empty";
        if ($request->link)
            $link = $request->link;

        $lable = "empty";
        if ($request->lable)
            $lable = $request->lable;

        $resultHeaderMenu = HeaderMenu::create(
            [
                'code' => "empty",
                'title' => $request->title,
                'lable' => $lable,
                'link' => $link,
                'operator' => Auth::user()->id,
                'extra' => 'empty',
            ]
        );
        if ($resultHeaderMenu) {
            HeaderMenuChild::create(
                [
                    'code' => "empty",
                    'title' => $request->title_child,
                    'header_menu_id' => $resultHeaderMenu->id,
                    'image' => $img,
                    'operator' => Auth::user()->id,
                    'extra' => 'empty',
                ]
            );
        }

        return redirect()->route('header-menu.index');
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
