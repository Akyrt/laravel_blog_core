<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexImageRequest;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use App\Http\Resources\Image as ImageResource;

class ImageController extends Controller
{

    public function index(IndexImageRequest $request)
    {
        $image = Image::where('post_id', $request->post_id)->get();

        return response()->json($image, 200);
    }

    public function create()
    {
        //
    }

    public function store(StoreImageRequest $request)
    {
        $image = new Image;

        $image->url = $request->url;
        $image->type = $request->type;
        $image->post_id = $request->post_id;

        $image->save();

        return response()->json($image, 201);
    }

    public function show(Image $image)
    {
        return response()->json(new ImageResource($image), 200);

    }

    public function edit(Image $image)
    {
        //
    }

    public function update(UpdateImageRequest $request, Image $image)
    {
        $image->url = $request->url;
        $image->type = $request->type;
        $image->post_id = $request->post_id;

        if ($image->isClean()) {
            return response()->json([], 204);
        }
        $image->update();

        return response()->json($image, 200);
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return response()->json([], 204);
    }
}
