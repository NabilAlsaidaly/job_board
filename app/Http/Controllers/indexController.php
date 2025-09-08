<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('index',["Pagetitle"=>"Home"]);
    }
}
