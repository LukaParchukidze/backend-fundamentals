<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        return view('posts/index')->with('posts', Post::all());
    }

    public function postsByUser() {
        $posts = Post::all()->where('user_id', Auth::id());

        return view('posts/my_posts')->with('posts', $posts)->with( 'author', User::all()->find(Auth::id()));
    }

    public function read(Post $post)
    {
        return view('posts/read')->with('post', $post);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with('post', $post);
    }

    public function create() {
        return view('posts/create');
    }

    public function save(SavePostRequest $request) {
        $post = new Post($request->all());

        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('posts.read', $post);
    }

    public function update(Request $request, Post $post) {
        $post->update($request->all());

        return redirect()->route('posts.read', $post);
    }

    public function delete(Post $post) {
        $post->delete();

        return redirect()->route('posts');
    }
}
