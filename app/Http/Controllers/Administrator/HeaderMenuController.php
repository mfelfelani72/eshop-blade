<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\HeaderMenu;
use App\Models\Administrator\HeaderMenuChild;
use App\Models\Administrator\HeaderMenuGrandchild;
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


        $file = $request->file('image');
        $img = "";

        if (!empty($file)) {
            $img = time() . "." . $file->getClientOriginalExtension();
            $file->move('front/img/header-menu', $img);
        }

        Validator::make($request->all(), [
            'title' => 'required',
        ], [

            'title.required' => __('dashboard.title') . __('dashboard.is-required'),

        ])
            ->validate();

        if ($request->addChild) {

            Validator::make(['image' => $img], [
                'image' => 'required',
            ], [
                'image.required' => __('dashboard.image') . __('dashboard.is-required'),
            ])->validate();

            Validator::make($request->all(), [
                'title_child' => 'required',
            ], [

                'title_child.required' => __('dashboard.title_child') . __('dashboard.is-required'),

            ])
                ->validate();
        }

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
        if ($resultHeaderMenu && $request->addChild == "on") {
            $resultHeaderMenuChild = HeaderMenuChild::create(
                [
                    'code' => "empty",
                    'title' => $request->title_child,
                    'header_menu_id' => $resultHeaderMenu->id,
                    'image' => $img,
                    'operator' => Auth::user()->id,
                    'extra' => 'empty',
                ]
            );
            if ($resultHeaderMenuChild && $request->grand_child[0]['title'] && $request->grand_child[0]['link']) {
                foreach ($request->grand_child as $item) {
                    HeaderMenuGrandchild::create([
                        'code' => "empty",
                        'title' => $item['title'],
                        'link' => $item['link'],
                        'header_menu_child_id' => $resultHeaderMenuChild->id,
                        'operator' => Auth::user()->id,
                        'extra' => 'empty',
                    ]);
                }
            }
        }

        return redirect()->route('header-menu.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $headerMenu = HeaderMenu::findOrFail($id);

        $address = 'administrator/headerMenu/edit';
        return view('administrator.dashboard.base-index', compact('address', 'headerMenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $headerMenu = HeaderMenu::findOrFail($id);
        $file = $request->file('image');
        $img = "";

        if (!empty($file))
            $img = time() . "." . $file->getClientOriginalExtension();

        if ($request->addChild) {

            if (!$headerMenu->child) {

                Validator::make(['image' => $img], [
                    'image' => 'required',
                ], [
                    'image.required' => __('dashboard.image') . __('dashboard.is-required'),
                ])->validate();
               
            }

            Validator::make($request->all(), [
                'title_child' => 'required',
            ], [

                'title_child.required' => __('dashboard.title_child') . __('dashboard.is-required'),

            ])
                ->validate();
        }

        if (!empty($file)) {
            if ($headerMenu->child && file_exists('front/img/header-menu/' . $headerMenu->child->image)) {
                unlink('front/img/header-menu/' . $headerMenu->child->image);
            }

            $file->move('front/img/header-menu', $img);
        } elseif ($headerMenu->child) {
            $img = $headerMenu->child->image;
        }


        $link = "empty";
        if ($request->link !== "empty")
            $link = $request->link;

        $lable = "empty";
        if ($request->lable !== "empty")
            $lable = $request->lable;

        $resultHeaderMenu = $headerMenu->update([
            'code' => "empty",
            'title' => $request->title,
            'lable' => $lable,
            'link' => $link,
            'operator' => Auth::user()->id,
            'extra' => 'empty',
        ]);

        // delete last childs
        if ($headerMenu->child) {
            $resultHeaderMenuchildDelete = HeaderMenuchild::where('header_menu_id', $headerMenu->id)->delete();
            $resultHeaderMenuGrandchildDelete = HeaderMenuGrandchild::where('header_menu_child_id', $headerMenu->child->id)->delete();
        }


        // delete last childs

        if ($resultHeaderMenu && $request->addChild == "on") {

            $resultHeaderMenuChild = HeaderMenuChild::create(
                [
                    'code' => "empty",
                    'title' => $request->title_child,
                    'header_menu_id' => $id,
                    'image' => $img,
                    'operator' => Auth::user()->id,
                    'extra' => 'empty',
                ]
            );



            if ($resultHeaderMenuChild && $request->grand_child && $request->grand_child[0]['title'] && $request->grand_child[0]['link']) {
                foreach ($request->grand_child as $item) {
                    HeaderMenuGrandchild::create([
                        'code' => "empty",
                        'title' => $item['title'],
                        'link' => $item['link'],
                        'header_menu_child_id' => $resultHeaderMenuChild->id,
                        'operator' => Auth::user()->id,
                        'extra' => 'empty',
                    ]);
                }
            }
        }

        return redirect()->route('header-menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $headerMenu = HeaderMenu::findOrFail($id);

        if ($headerMenu->child && file_exists('front/img/header-menu/' . $headerMenu->child->image)) {
            unlink('front/img/header-menu/' . $headerMenu->child->image);
        }

        $headerMenu->destroy($id);
        return redirect()->route('header-menu.index');
    }
}
