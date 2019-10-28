<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexCounterRequest;
use App\Http\Requests\StoreCounterRequest;
use App\Http\Requests\UpdateCounterRequest;
use App\Http\Resources\Counter as CounterResource;
use App\Models\Counter;

class CounterController extends Controller
{
    public function index(IndexCounterRequest $request)
    {
        $counter = Counter::where('post_id', $request->post_id)->get();

        return response()->json($counter, 200);

    }

    public function create()
    {
        //
    }

    public function store(StoreCounterRequest $request)
    {
        $counter = new Counter;

        $counter->visits++;
        $counter->likes = $request->likes;
        $counter->dislikes = $request->dislikes;
        $counter->post_id = $request->post_id;

        $counter->save();

        return response()->json($counter, 200);
    }

    public function show(Counter $counter)
    {
        return response()->json(new CounterResource($counter), 200);
    }

    public function edit(Counter $counter)
    {
        //
    }

    public function update(UpdateCounterRequest $request, Counter $counter)
    {
        $counter->likes = $request->likes ? ++$counter->likes: $counter->likes;
        $counter->dislikes = $request->dislikes ? ++$counter->dislikes : $counter->dislikes;
        $counter->post_id = $request->post_id;

        if ($counter->isClean()) {
            return response()->json([], 204);
        }

        $counter->visits++;
        $counter->update();

        return response()->json($counter, 200);
    }

    public function destroy(Counter $counter)
    {
        $counter->delete();

        return response()->json([], 204);
    }
}
