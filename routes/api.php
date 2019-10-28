<?php

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
Route::resource('images', 'ImageController');
Route::resource('counter', 'CounterController');
