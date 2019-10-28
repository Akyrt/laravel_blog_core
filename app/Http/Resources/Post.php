<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'user' => $this->user,
            'comments' => $this->comments,
            'images' => $this->images,
            'counter' => $this->counter,
        ];
    }
}
