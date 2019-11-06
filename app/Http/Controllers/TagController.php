<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;

class TagController extends Controller
{

    public function index()
    {
        $tags = TagResource::collection(Tag::all());
        return response()->json($tags, 200);
    }

    public function create()
    {
        //
    }

    public function store(StoreTagRequest $request)
    {
        $tag = new Tag;

        $tag->name = $request->name;

        $tag->save();

        return response()->json($tag, 201);
    }

    public function show(Tag $tag)
    {
        return response()->json(new TagResource($tag), 200);
    }

    public function edit(Tag $tag)
    {
        //
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->name = $request->name;
        if ($tag->isClean()) {
            return response()->json([], 204);
        }

        $tag->update();

        return response()->json($tag, 200);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([], 204);
    }
}
