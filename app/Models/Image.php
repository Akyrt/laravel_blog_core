<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'url', 'type', 'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
