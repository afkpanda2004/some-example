<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Collection;

class AboutController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('about',compact('posts'));

    }


}

