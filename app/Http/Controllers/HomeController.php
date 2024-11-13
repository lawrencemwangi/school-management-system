<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomePage ()
    {
        return view('auth.login');
    }

    public function Contactpage ()
    {
        return view('contact');
    }
}
