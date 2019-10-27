<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use Carbon\Carbon;
use App\Http\Resources\Comment as CommentResource;

class CommentController extends Controller
{
    public function index(IndexCommentRequest $request)
    {
        $comments = Comment::where('post_id', $request->post_id)->get();

        return response()->json($comments, 200);

    }

    public function create()
    {
        //
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = new Comment;

        $comment->author = $request->author;
        $comment->content = $request->comment_content;
        $comment->post_id = $request->post_id;
        $comment->posted_at = Carbon::now();

        $comment->save();

        return response()->json($comment, 200);

    }

    public function show(Comment $comment)
    {
        return response()->json(new CommentResource($comment), 200);

    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {

        $comment->author = $request->author;
        $comment->content = $request->comment_content;
        $comment->post_id = $request->post_id;

        if ($comment->isClean()) {
            return response()->json([], 204);
        }

        $comment->update();

        return response()->json($comment, 200);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([], 204);
    }
}
