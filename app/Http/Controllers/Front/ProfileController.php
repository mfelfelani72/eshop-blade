<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     *  Display information from Register User
     */

    public function Dashboard()
    {

        // dd("ok");

        $address = 'front/profile/information/index';
        // return view($address, compact('address'));

        return view('front/profile.dashboard.base-index', compact('address'));
    }
}
