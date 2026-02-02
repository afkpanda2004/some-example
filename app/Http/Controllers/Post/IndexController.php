<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validate();
        $query = Post::query();

        if(isset($data['category_id'])){
            $query->where('category_id', $data['category_id']);
        }
        if(isset($data['title'])){
            $query->where('title', 'like', "%{$data['title']}%");
        }
        $posts = $query->get();
        dd($posts);
//        return view('post.index',compact('posts'));
    }


}

