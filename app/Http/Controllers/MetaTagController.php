<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexMetaTagRequest;
use App\Http\Requests\StoreMetaTagRequest;
use App\Http\Requests\UpdateMetaTagRequest;
use App\Models\MetaTag;
use App\Http\Resources\MetaTag as MetaTagResource;

class MetaTagController extends Controller
{
    public function index(IndexMetaTagRequest $request)
    {
        $meta = MetaTag::where('post_id', $request->post_id)->get();

        return response()->json($meta, 200);
    }

    public function create()
    {
        //
    }

    public function store(StoreMetaTagRequest $request)
    {
        $metaTag = new MetaTag;

        $metaTag->title = $request->title;
        $metaTag->description = $request->description;
        $metaTag->post_id = $request->post_id;

        $metaTag->save();

        return response()->json($metaTag, 200);
    }

    public function show(MetaTag $metaTag)
    {
        return response()->json(new MetaTagResource($metaTag), 200);
    }

    public function edit(MetaTag $metaTag)
    {
        //
    }

    public function update(UpdateMetaTagRequest $request, MetaTag $metaTag)
    {
        $metaTag->title = $request->title;
        $metaTag->description = $request->description;
        $metaTag->post_id = $request->post_id;

        if ($metaTag->isClean()) {
            return response()->json([], 204);
        }

        $metaTag->update();

        return response()->json($metaTag, 200);
    }

    public function destroy(MetaTag $metaTag)
    {
        $metaTag->delete();

        return response()->json([], 204);
    }
}
