<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{

    public function saving(Post $post)
    {
//        $post->user_id = auth()->user()->id;
        $post->user_id = 1;
    }
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        if (request()->has('tags_ids')) {
            $post->tags()->sync(request()->get('tags_ids'));
        }
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        if (request()->has('tags_ids')) {
            $post->tags()->sync(request()->get('tags_ids'));
        }
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
