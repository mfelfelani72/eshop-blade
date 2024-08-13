<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Front\UserProfile;
use App\Models\Front\UserProfileAddress;
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
        $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();

        $address = 'front/profile/information';
        return view('front/profile.base-index', compact('address', 'userProfile'));
    }

    public function editInformation()
    {

        $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();


        $address = 'front/profile/edit-information';
        return view('front/profile.base-index', compact('address', 'userProfile'));
    }
    public function storeInformation(Request $request)
    {
        $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();

        $file1 = $request->file('image');
        $file2 = $request->file('cover');
        $img = "";
        $cover = "";


        if (!empty($file1)) {
            if ($userProfile->image && file_exists('front/img/profile/' . $userProfile->image)) {
                unlink('front/img/profile/' . $userProfile->image);
            }
            $img = time() . "." . $file1->getClientOriginalExtension();
            $file1->move('front/img/profile', $img);
        } else {
            $img = $userProfile->image;
        }

        if (!empty($file2)) {
            if ($userProfile->cover && file_exists('front/img/profile/' . $userProfile->cover)) {
                unlink('front/img/profile/' . $userProfile->cover);
            }
            $cover = time() . "." . $file2->getClientOriginalExtension();
            $file2->move('front/img/profile', $cover);
        } else {
            $cover = $userProfile->cover;
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

        if (!$userProfile->image)

            Validator::make(['image' => $img], [
                'image' => 'required',
            ], [
                'image.required' => __('dashboard.image') . __('dashboard.is-required'),
            ])->validate();

        if (!$userProfile->cover)

            Validator::make(['cover' => $cover], [
                'cover' => 'required',
            ], [
                'cover.required' => __('dashboard.cover') . __('dashboard.is-required'),
            ])->validate();

        $bio = "";
        $about = "";
        if ($request->bio)
            $bio = $request->bio;
        if ($request->about)
            $about = $request->about;

        $userProfile->update([

            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'bio' => $bio,
            'about' => $about,
            'image' => $img,
            'cover' => $cover,

        ]);

        return redirect()->route('user-information');
    }

    public function address()
    {

        $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();
        $userProfileAddress = UserProfile::addresses();

        $address = 'front/profile/address';
        return view('front/profile.base-index', compact('address', 'userProfile', 'userProfileAddress'));
    }

    public function editAddress(string $id)
    {

        $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();
        // dd("sda");
        $userProfileAddress = new UserProfileAddress();
        if ($id !== '0')
            $userProfileAddress = UserProfileAddress::findOrFail($id);
        // dd("sda");
        $address = 'front/profile/edit-address';
        return view('front/profile.base-index', compact('address', 'id', 'userProfile', 'userProfileAddress'));
    }

    public function storeAddress(Request $request, string $id)
    {


        Validator::make($request->all(), [
            // 'country' => 'required',
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
            // 'avenue' => 'required',
            'home_number' => 'required',
            'zip_code' => 'required',
            'floor' => 'required',
            'unit' => 'required',
            'location' => 'required',
        ], [
            // 'country.required' => __('dashboard.country') . __('dashboard.is-required'),
            'province.required' => __('dashboard.province') . __('dashboard.is-required'),
            'city.required' => __('dashboard.city') . __('dashboard.is-required'),
            'street.required' => __('dashboard.street') . __('dashboard.is-required'),
            // 'avenue.required' => __('dashboard.avenue') . __('dashboard.is-required'),
            'home_number.required' => __('dashboard.home_number') . __('dashboard.is-required'),
            'zip_code.required' => __('dashboard.zip_code') . __('dashboard.is-required'),
            'floor.required' => __('dashboard.floor') . __('dashboard.is-required'),
            'unit.required' => __('dashboard.unit') . __('dashboard.is-required'),
            'location.required' => __('dashboard.location') . __('dashboard.is-required'),
        ])
            ->validate();
        // dd($request);
        $country = "";
        $avenue = "";
        if ($request->country)
            $country = $request->country;
        if ($request->avenue)
            $avenue = $request->avenue;



        if ($id !== '0') {
            $userProfileAddress = UserProfileAddress::findOrFail($id);
            $userProfileAddress->update([
                'country' => $country,
                'province' => $request->province,
                'city' => $request->city,
                'street' => $request->street,
                'avenue' => $avenue,
                'home_number' => $request->home_number,
                'zip_code' => $request->zip_code,
                'floor' => $request->floor,
                'unit' => $request->unit,
                'location' => $request->location,
            ]);
        } else {
            UserProfileAddress::create([
                'user_id' => Auth::user()->id,
                'country' => $country,
                'province' => $request->province,
                'city' => $request->city,
                'street' => $request->street,
                'avenue' => $avenue,
                'home_number' => $request->home_number,
                'zip_code' => $request->zip_code,
                'floor' => $request->floor,
                'unit' => $request->unit,
                'location' => $request->location,
            ]);
        }


        return redirect()->route('user-address');
    }

    public function settings()
    {
        dd("ok");
        $address = 'front/profile/settings';
        return view('front/profile.base-index', compact('address'));
    }
}
