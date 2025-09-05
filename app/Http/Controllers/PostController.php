<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $data=Post::cursorPaginate(5);
        return view('post.index',['posts'=>$data,"Pagetitle"=>'Blog']);
    }

    function create()
    {
        Post::factory(10)->create();
        return redirect('/blog');
    }
}
