<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;


class PostController extends Controller
{

    public function index()
    {
        $posts = PostResource::collection(Post::all());
        return response()->json($posts, 200);
    }

    public function create()
    {
        //
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return response()->json(new PostResource($post), 200);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->title = $request->title;
        $post->description = $request->description;

        if ($post->isClean()) {
            return response()->json([], 204);
        }
        $post->update();

        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([], 204);

    }
}
