<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::query()->insert([
            'title' => Str::random(5),
            'description' => Str::random(100),
            'likes' => rand(0, 200),
        ]);
    }
}
