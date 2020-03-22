<?php

use App\Post;
use App\PostImage;
use Illuminate\Database\Seeder;

class PostImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::get();
        foreach ($posts as $key => $p) {
            PostImage::create([
                'image' => "1584910331.png",
                'post_id' => $p->id
            ]);
        }
    }
}
