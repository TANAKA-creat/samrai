<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //index
    public function index()
    {
        $posts = Post::latest()->get();
        $users = Auth::user()->users;

        return view('index')
        ->with(['posts'=>$posts])
        ->with(['users'=>$users]);
    }

        //show
        public function show(Post $post)
         {
            return view('posts.show')
            ->with(['post'=> $post]);
        }

        //create
        public function create()
        {
            return view('posts.create');
        }

        //store
        public function store(PostRequest $request)
        {
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            return redirect()
                ->route('posts.index');
        }

        //edit
        public function edit(Post $post)
        {
            return view('posts.edit')
             ->with(['post'=> $post]);
        }

        //update
        public function update(PostRequest $request, Post $post)
        {
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            return redirect()
                ->route('posts.show', $post);
        }

        //delete
        public function destroy(Post $post)
        {
            $post->delete();

            return redirect()
                ->route('posts.index');
        }
}

