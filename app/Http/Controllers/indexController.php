<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return view('index',["Pagetitle"=>"Home"]);
    }
    public function about()
    {
        return view('about',["Pagetitle"=>"About"]);
    }
    public function contact()
    {
        return view('contact',["Pagetitle"=>"Contact"]);
    }
}
