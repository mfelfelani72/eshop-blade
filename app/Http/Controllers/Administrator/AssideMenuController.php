<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\AssideMenu;
use App\Models\Administrator\AssideMenuChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        //    dd($request);

        $file = $request->file('image');
        $img = "";

        if (!empty($file)) {
            $img = time() . "." . $file->getClientOriginalExtension();
            $file->move('front/img/asside-menu', $img);
        }

        Validator::make($request->all(), [
            'title' => 'required',
            'priority' => 'required',
            'icon' => 'required',
        ], [

            'title.required' => __('dashboard.title') . __('dashboard.is-required'),
            'priority.required' => __('dashboard.priority') . __('dashboard.is-required'),
            'icon.required' => __('dashboard.icon') . __('dashboard.is-required'),

        ])
            ->validate();

        if ($request->addChild) {

            Validator::make(['image' => $img], [
                'image' => 'required',
            ], [
                'image.required' => __('dashboard.image') . __('dashboard.is-required'),
            ])->validate();

            Validator::make(
                [
                    'title_child' => $request->child[0]['title'],
                    'link_child' => $request->child[0]['title'],
                ],
                [
                    'title_child' => 'required',
                    'link_child' => 'required',
                ],
                [

                    'title_child.required' => __('dashboard.title_child') . __('dashboard.is-required'),
                    'link_child.required' => __('dashboard.link_child') . __('dashboard.is-required'),
                ]
            )
                ->validate();


            // dd("ok");
        }

        $link = "empty";
        if ($request->link)
            $link = $request->link;


        $resultAssideMenu = AssideMenu::create(
            [
                'code' => "am-" . substr(str_shuffle("0123456789"), 0, 4),
                'title' => $request->title,
                'link' => $link,
                'icon' => $request->icon,
                'priority' => $request->priority,
                'image' => $img,
                'operator' => Auth::user()->id,
                'extra' => 'empty',
            ]
        );
        if ($resultAssideMenu && $request->addChild == "on") {
            foreach ($request->child as $item) {
                $resultAssideMenuChild = AssideMenuChild::create(
                    [
                        'asside_menu_id' => $resultAssideMenu->id,
                        'code' => "amch-" . substr(str_shuffle("0123456789"), 0, 4),
                        'title' => $item['title'],
                        'link' => $item['link'],
                        'operator' => Auth::user()->id,
                        'extra' => 'empty',
                    ]
                );
            }
        }

        return redirect()->route('asside-menu.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assideMenu = AssideMenu::findOrFail($id);

        $address = 'administrator/assideMenu/edit';
        return view('administrator.dashboard.base-index', compact('address', 'assideMenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);

        $assideMenu = AssideMenu::findOrFail($id);
        $file = $request->file('image');
        $img = "";

        if (!empty($file))
            $img = time() . "." . $file->getClientOriginalExtension();

        if ($request->addChild) {

            if (!$assideMenu->childs) {

                Validator::make(['image' => $img], [
                    'image' => 'required',
                ], [
                    'image.required' => __('dashboard.image') . __('dashboard.is-required'),
                ])->validate();
            }


            Validator::make(
                [
                    'title_child' => $request->child[0]['title'],
                    'link_child' => $request->child[0]['title'],
                ],
                [
                    'title_child' => 'required',
                    'link_child' => 'required',
                ],
                [

                    'title_child.required' => __('dashboard.title_child') . __('dashboard.is-required'),
                    'link_child.required' => __('dashboard.link_child') . __('dashboard.is-required'),
                ]
            )
                ->validate();
        }

        if (!empty($file)) {
            if ($assideMenu->childs && file_exists('front/img/asside-menu/' . $assideMenu->image)) {
                unlink('front/img/asside-menu/' . $assideMenu->image);
            }

            $file->move('front/img/asside-menu', $img);
        } elseif ($assideMenu->childs) {
            $img = $assideMenu->image;
        }

        $link = "empty";
        if ($request->link !== "empty")
            $link = $request->link;

        $resultAssideMenu = $assideMenu->update([
            'code' => $assideMenu->code,
            'title' => $request->title,
            'link' => $link,
            'icon' => $request->icon,
            'priority' => $request->priority,
            'image' => $img,
            'operator' => Auth::user()->id,
            'extra' => 'empty',
        ]);

        // delete last childs
        $lastData = null;
        if ($assideMenu->childs) {

            foreach ($assideMenu->childs as $key => $item) {

                $lastData[$key]['ch-code'] = $item->code;
                $lastData[$key]['ch-title'] = $item->title;
            }
            // dd($lastData);

            $resultAssideMenuChildDelete = AssideMenuChild::where('asside_menu_id', $assideMenu->id)->delete();
        }


        // delete last childs

        if (
            $resultAssideMenu && $request->addChild == "on"
        ) {
            // dd($request->title_child);

            $key = 0;
            foreach ($request->child as $item) {
                if ($item !== null) {
                    $code = "hmch-" . substr(str_shuffle("0123456789"), 0, 4);
                    if ($lastData !== null && $lastData[$key]['ch-title'] == $item['title'])
                        $code = $lastData[$key]['ch-code'];

                    $resultAssideMenuChild = AssideMenuChild::create(
                        [
                            'code' => $code,
                            'title' => $item['title'],
                            'link' => $item['link'],
                            'asside_menu_id' => $id,
                            'operator' => Auth::user()->id,
                            'extra' => 'empty',
                        ]
                    );
                }
            }
        }

        return redirect()->route('asside-menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assideMenu = AssideMenu::findOrFail($id);

        if (file_exists('front/img/asside-menu/' . $assideMenu->image !== "")) {
            unlink('front/img/asside-menu/' . $assideMenu->image);
        }

        $assideMenu->destroy($id);
        return redirect()->route('asside-menu.index');
    }
}
