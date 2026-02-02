<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Collection;

class ContentController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('contact',compact('posts'));

    }

}

