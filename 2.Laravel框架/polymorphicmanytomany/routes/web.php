<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function() {
    $post = Post::create(['name'=>'First post']);
    $tag1 = Tag::findOrFail(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'Video.mp4']);
    $tag2 = Tag::findOrFail(2);
    $video->tags()->save($tag2);
});

Route::get('/read', function() {
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag) {
        return $tag;
    }

    // $tag = Tag::findOrFail(2);

    // foreach($tag->videos as $video) {
    //     return $video;
    // }
});

Route::get('/update', function() {
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag) {
        $tag->name = 'Update PHP';
        $tag->save();
    }

    // $post = Post::findOrFail(1);

    // foreach($post->tags as $tag) {
    //     $tag->whereName('Update PHP')->update(['name'=>'PHP']);
    // }

    // $post = Post::findOrFail(1);
    // $tag = Tag::findOrFail(3);
    // $post->tags()->sync([1,2]);
});

Route::get('/delete', function() {
    $post = Post::findOrFail(1);
    $video = Video::findOrFail(1);
    $video->tags()->detach();
});
