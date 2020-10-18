<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts/index')->with('posts', $posts);
    }

    public function read(Post $post)
    {
        return view('posts/read')->with('post', $post);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with('post', $post);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function save(Request $request)
    {
        $post = new Post($request->all());

        $post->save();

        return redirect()->route('posts.read', $post);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('posts.read', $post);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('posts');
    }
}
