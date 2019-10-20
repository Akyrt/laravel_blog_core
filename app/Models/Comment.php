<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'post_id', 'content', 'author', 'posted_at'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
