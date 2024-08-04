<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     *  Display information from Register User
     */

    public function Information()
    {

        // dd("ok");

        $address = 'front/profile/information';
        return view('front/profile.base-index', compact('address'));
    }

    public function data()
    {

        // dd("ok");

        $address = 'front/profile/data';
        return view('front/profile.base-index', compact('address'));
    }
}
