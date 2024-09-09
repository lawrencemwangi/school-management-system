<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomePage ()
    {
        return view('home');
    }

    public function Admin ()
    {
        return view('home');
    }

    public function About ()
    {
        return view('about');
    }

    public function Contact ()
    {
        return view('contact');
    }
}
