<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Front\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     *  Display information from Register User
     */

    public function information()
    {
        $userProfile = UserProfile::findOrFail(Auth::user()->id);

        $address = 'front/profile/information';
        return view('front/profile.base-index', compact('address', 'userProfile'));
    }

    public function editInformation()
    {

        $userProfile = UserProfile::findOrFail(Auth::user()->id);

        $address = 'front/profile/edit-information';
        return view('front/profile.base-index', compact('address', 'userProfile'));
    }
    public function storeInformation(Request $request)
    {

        $file1 = $request->file('image');
        $file2 = $request->file('cover');
        $img = "";
        $cover = "";

        if (!empty($file1)) {
            $img = time() . "." . $file1->getClientOriginalExtension();
            $file1->move('front/img/profile', $img);
        }

        if (!empty($file2)) {
            $cover = time() . "." . $file2->getClientOriginalExtension();
            $file2->move('front/img/profile', $cover);
        }


        Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ], [
            'name.required' => __('dashboard.name') . __('dashboard.is-required'),
            'last_name.required' => __('dashboard.last_name') . __('dashboard.is-required'),
            'email.required' => __('dashboard.email') . __('dashboard.is-required'),
            'mobile.required' => __('dashboard.mobile') . __('dashboard.is-required'),
        ])
            ->validate();

        Validator::make(['img' => $img, 'cover' => $cover], [
            'img' => 'required',
            'cover' => 'required',
        ], [
            'img.required' => __('dashboard.image') . __('dashboard.is-required'),
            'cover.required' => __('dashboard.cover') . __('dashboard.is-required'),
        ])->validate();

        $userProfile = UserProfile::findOrFail(Auth::user()->id);

        $userProfile->update([

            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'image' => $img,
            'cover' => $cover,

        ]);

        return redirect()->route('user-information');

        // return view('front/profile.base-index', compact('address', 'userProfile'));
    }

    public function address()
    {

        $userProfile = UserProfile::findOrFail(Auth::user()->id);
        $userProfileAddress = UserProfile::addresses();

        $address = 'front/profile/address';
        return view('front/profile.base-index', compact('address', 'userProfile', 'userProfileAddress'));
    }

    public function settings()
    {
        dd("ok");
        $address = 'front/profile/settings';
        return view('front/profile.base-index', compact('address'));
    }
}
