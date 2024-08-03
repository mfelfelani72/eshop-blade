<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     *  Display information from Register User
     */

     public function Dashboard(){

        dd("ok");

        $address = 'front/profile/dashboard';
        return view('front.front.base-index', compact('address'));
     }
}
