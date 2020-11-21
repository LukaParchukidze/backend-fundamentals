<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use App\Models\Tag;
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

        return view('posts/my_posts', compact('posts'))->with( 'author', Auth::user());
    }

    public function read(Post $post)
    {
        $tags = Tag::all();

        return view('posts/read', compact('post', 'tags'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('posts/edit', compact('post', 'tags'));
    }

    public function create() {
        $tags = Tag::all();

        return view('posts/create', compact('tags'));
    }

    public function save(SavePostRequest $request) {
        $post = new Post($request->all());

        $post->user_id = Auth::id();

        $post->save();

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.read', $post);
    }

    public function update(Request $request, Post $post) {
        $post->update($request->all());

        $post->tags()->detach($post->tags->pluck('id'));

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.read', $post);
    }

    public function delete(Post $post) {
        $post->delete();

        return redirect()->route('posts');
    }
}
