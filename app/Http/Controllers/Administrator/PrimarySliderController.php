<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator\PrimarySlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrimarySliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $primarySliders = PrimarySlider::all();
        $address = 'administrator/primarySlider/index';
        return view('administrator.dashboard.base-index', compact('address', 'primarySliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $address = 'administrator/primarySlider/create';
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
            $file->move('front/img/slider', $img);
        }

        Validator::make(['img' => $img], [
            'img' => 'required',
        ], [
            'img.required' => __('dashboard.image') . __('dashboard.is-required'),
        ])->validate();

        Validator::make($request->all(), [
            'title' => 'required',
            'slogan' => 'required',
            'category' => 'required',
            'link_title' => 'required',
            'link' => 'required',
            'description' => 'required',
        ], [
            'title.required' => __('dashboard.title') . __('dashboard.is-required'),
            'slogan.required' => __('dashboard.slogan') . __('dashboard.is-required'),
            'category.required' => __('dashboard.category') . __('dashboard.is-required'),
            'link_title.required' => __('dashboard.link_title') . __('dashboard.is-required'),
            'link.required' => __('dashboard.link') . __('dashboard.is-required'),
            'description.required' => __('dashboard.description') . __('dashboard.is-required'),
        ])
            ->validate();

        PrimarySlider::create(
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

        return redirect()->route('primary-slider.index');
        
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
        $primarySlider = PrimarySlider::findOrFail($id);
        $file = $request->file('image');
        $img = "";

        if (!empty($file)) {
            if (file_exists('front/img/slider/' . $primarySlider->img)) {
                unlink('front/img/slider/' . $primarySlider->img);
            }
            $img = time() . "." . $file->getClientOriginalExtension();
            $file->move('front/img/slider', $img);
        } else {
            $img = $primarySlider->img;
        }

        $primarySlider->update([

            'title' => $request->title,
            'slogan' => $request->slogan,
            'category' => $request->category,
            'link_title' => $request->link_title,
            'link' => $request->link,
            'description' => $request->description,
            'img' => $img,

        ]);

        return redirect()->route('primary-slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
        $primarySlider = PrimarySlider::findOrFail($id);

        $primarySlider->destroy($id);
        return redirect()->route('primary-slider.index');
    }
}
