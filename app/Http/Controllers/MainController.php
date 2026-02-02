<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Collection;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('main',compact('posts'));

    }

}

