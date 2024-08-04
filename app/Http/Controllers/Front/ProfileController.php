<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Front\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function address()
    {

        $userProfile = UserProfile::findOrFail(Auth::user()->id);
        $userProfileAddress = UserProfile::addresses();

        $address = 'front/profile/address';
        return view('front/profile.base-index', compact('address', 'userProfile', 'userProfileAddress'));
    }

    public function settings()
    {

        // dd("ok");

        $address = 'front/profile/settings';
        return view('front/profile.base-index', compact('address'));
    }
}
