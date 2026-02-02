<?php

namespace App\Http\Controllers;


use App\Models\PostTag;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Support\Collection;
use League\CommonMark\Extension\Mention\Mention;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index',compact('posts'));

    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create',compact('categories', 'tags'));

    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',

        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show',compact('post'));

    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();


        return view('post.edit',compact('post', 'categories', 'tags'));

    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show',$post->id);

    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');

    }



    public function delete()
    {
        $postDel = Post::withTrashed()->find(6);
        $postDel->restore();
        dd('deleted');


    }

    public function firstOrCreate()
    {

        $anotherPost = [
            'title' => 'title on java',
            'content' => 'java-content',
            'image' => 'java.gif',
            'likes' => 5,
            'is_published' => 0,

        ];

        $post = Post::firstOrCreate([

            'title' => 'title on java'

        ],[

            'title' => 'title on java',
            'content' => 'java-content',
            'image' => 'java.gif',
            'likes' => 5,
            'is_published' => 0,

        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {

        $anotherPost = [
            'title' => 'title on java',
            'content' => 'java-content',
            'image' => 'java.gif',
            'likes' => 5,
            'is_published' => 0,

        ];

        $post = Post::updateOrCreate(['title' => 'title on java'], $anotherPost);
        dump($post->content);
        dd('finished');

    }




}

