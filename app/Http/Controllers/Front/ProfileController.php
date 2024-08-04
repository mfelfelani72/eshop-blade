<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     *  Display information from Register User
     */

    public function information()
    {

        // dd("ok");

        $address = 'front/profile/information';
        return view('front/profile.base-index', compact('address'));
    }

    public function address()
    {

        // dd("ok");

        $address = 'front/profile/address';
        return view('front/profile.base-index', compact('address'));
    }

    public function settings()
    {

        // dd("ok");

        $address = 'front/profile/settings';
        return view('front/profile.base-index', compact('address'));
    }
}
