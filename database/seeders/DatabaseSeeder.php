<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(20)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(200)->create();

        $tagsIds = $tags->random(5)->pluck('id');
        foreach ($posts as $post){
            $post->tags()->attach($tagsIds);
        }


    }
}
