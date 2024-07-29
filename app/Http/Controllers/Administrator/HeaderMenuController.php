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
        // dd($request);
        $file = $request->file('image');
        $img = "";

        if (!empty($file)) {
            $img = time() . "." . $file->getClientOriginalExtension();
            $file->move('front/img/header-menu', $img);
        }

        Validator::make($request->all(), [
            'title' => 'required',
            'priority' => 'required',
        ], [

            'title.required' => __('dashboard.title') . __('dashboard.is-required'),
            'priority.required' => __('dashboard.priority') . __('dashboard.is-required'),

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
                    'title_child' => $request->title_child[0],
                    'title_gchild' => $request->grand_child['child_1'][0]['title'],
                    'link_gchild' => $request->grand_child['child_1'][0]['link'],
                ],
                [
                    'title_child' => 'required',
                    'title_gchild' => 'required',
                    'link_gchild' => 'required',
                ],
                [

                    'title_child.required' => __('dashboard.title_child') . __('dashboard.is-required'),
                    'title_gchild.required' => __('dashboard.title_gchild') . __('dashboard.is-required'),
                    'link_gchild.required' => __('dashboard.link_child') . __('dashboard.is-required'),
                ]
            )
                ->validate();


            // dd("ok");
        }

        $link = "empty";
        if ($request->link)
            $link = $request->link;

        $lable = "empty";
        if ($request->lable)
            $lable = $request->lable;

        $resultHeaderMenu = HeaderMenu::create(
            [
                'code' => "hm-" . substr(str_shuffle("0123456789"), 0, 4),
                'title' => $request->title,
                'lable' => $lable,
                'link' => $link,
                'priority' => $request->priority,
                'operator' => Auth::user()->id,
                'extra' => 'empty',
            ]
        );
        if ($resultHeaderMenu && $request->addChild == "on") {
            $count = 1;
            foreach ($request->title_child as $title) {
                if ($title)
                    $resultHeaderMenuChild = HeaderMenuChild::create(
                        [
                            'code' => "hmch-" . substr(str_shuffle("0123456789"), 0, 4),
                            'title' => $title,
                            'header_menu_id' => $resultHeaderMenu->id,
                            'image' => $img,
                            'operator' => Auth::user()->id,
                            'extra' => 'empty',
                        ]
                    );
                // dd($request->grand_child);
                if (
                    $resultHeaderMenuChild && $request->grand_child['child_' . $count][0]['title'] &&
                    $request->grand_child['child_' . $count][0]['link']
                ) {
                    foreach ($request->grand_child['child_' . $count++] as $item) {
                        if ($item['title'])
                            HeaderMenuGrandchild::create([
                                'code' => "hmgch-" . substr(str_shuffle("0123456789"), 0, 4),
                                'title' => $item['title'],
                                'link' => $item['link'],
                                'header_menu_child_id' => $resultHeaderMenuChild->id,
                                'operator' => Auth::user()->id,
                                'extra' => 'empty',
                            ]);
                    }
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
        // dd($request->grand_child);
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
            'code' => $headerMenu->code,
            'title' => $request->title,
            'lable' => $lable,
            'link' => $link,
            'operator' => Auth::user()->id,
            'extra' => 'empty',
        ]);

        // delete last childs
        $lastData = null;
        if ($headerMenu->child) {

            foreach ($headerMenu->childs as $key => $item) {
                $count = 0;
                $lastData[$key]['ch-code'] = $item->code;
                $lastData[$key]['ch-title'] = $item->title;
                foreach ($item->grandChilds as $item2) {
                    $lastData[$key][$count]['gch-code'] = $item2->code;
                    $lastData[$key][$count++]['gch-title'] = $item2->title;
                }
            }
            // dd($lastData);

            $resultHeaderMenuchildDelete = HeaderMenuchild::where('header_menu_id', $headerMenu->id)->delete();
            $resultHeaderMenuGrandchildDelete = HeaderMenuGrandchild::where('header_menu_child_id', $headerMenu->child->id)->delete();
        }


        // delete last childs

        if ($resultHeaderMenu && $request->addChild == "on") {
            // dd($request->title_child);
            $count = 1;
            $key = 0;
            foreach ($request->title_child as $title) {
                if ($title !== null) {
                    $code = "hmch-" . substr(str_shuffle("0123456789"), 0, 4);
                    if ($lastData!==null && $lastData[$key]['ch-title'] == $title)
                        $code = $lastData[$key]['ch-code'];

                    $resultHeaderMenuChild = HeaderMenuChild::create(
                        [
                            'code' => $code,
                            'title' => $title,
                            'header_menu_id' => $id,
                            'image' => $img,
                            'operator' => Auth::user()->id,
                            'extra' => 'empty',
                        ]
                    );
                    // dd($request->grand_child);
                    if (
                        $resultHeaderMenuChild && $request->grand_child['child_' . $count][0]['title'] &&
                        $request->grand_child['child_' . $count][0]['link']
                    ) {
                        foreach ($request->grand_child['child_' . $count++] as $item) {

                            $countCh = 0;
                            $code = "hmgch-" . substr(str_shuffle("0123456789"), 0, 4);
                            if ($lastData !== null && $lastData[$key][$countCh]['gch-title'] == $item['title'])
                                $code = $lastData[$key][$countCh]['gch-code'];

                            if ($item['title'])
                                HeaderMenuGrandchild::create([
                                    'code' => $code,
                                    'title' => $item['title'],
                                    'link' => $item['link'],
                                    'header_menu_child_id' => $resultHeaderMenuChild->id,
                                    'operator' => Auth::user()->id,
                                    'extra' => 'empty',
                                ]);
                        }
                    }
                }
            }



            // $resultHeaderMenuChild = HeaderMenuChild::create(
            //     [
            //         'code' => "empty",
            //         'title' => $request->title_child,
            //         'header_menu_id' => $id,
            //         'image' => $img,
            //         'operator' => Auth::user()->id,
            //         'extra' => 'empty',
            //     ]
            // );



            // if ($resultHeaderMenuChild && $request->grand_child && $request->grand_child[0]['title'] && $request->grand_child[0]['link']) {
            //     foreach ($request->grand_child as $item) {
            //         HeaderMenuGrandchild::create([
            //             'code' => "empty",
            //             'title' => $item['title'],
            //             'link' => $item['link'],
            //             'header_menu_child_id' => $resultHeaderMenuChild->id,
            //             'operator' => Auth::user()->id,
            //             'extra' => 'empty',
            //         ]);
            //     }
            // }
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
