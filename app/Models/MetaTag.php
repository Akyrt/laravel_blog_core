<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    protected $fillable = [
        'title', 'description', 'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
