<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $fillable = [
        'visits', 'likes', 'dislikes', 'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
