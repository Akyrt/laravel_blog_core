<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function counter()
    {
        return $this->hasOne(Counter::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function metatag()
    {
        return $this->hasOne(MetaTag::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
