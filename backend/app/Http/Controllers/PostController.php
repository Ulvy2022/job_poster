<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return Post::all();
    }


    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = $request->user_id;
        $post->position = $request->position;
        $post->duties = $request->duties;
        $post->requirements = $request->requirements;
        $post->expiered = $request->expiered;
        $post->save();
        return response()->json(['msg' => 'created']);
    }


    public function show(Post $id)
    {
        return Post::with(['user'])->where('user_id',$id)->get();
    }


    public function update(Request $request, Post $id)
    {
        $post =Post::findOrFail($id);
        $post->user_id = $request->user_id;
        $post->position = $request->position;
        $post->duties = $request->duties;
        $post->requirements = $request->requirements;
        $post->expiered = $request->expiered;
        $post->update();
        return response()->json(['msg' => 'updated']);
    }


    public function destroy(Post $id)
    {
        return Post::destroy($id);
    }
}
