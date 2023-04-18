<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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
    $user = User::findOrFail(2);

    $post = new Post(['title'=>'Fourth post', 'body'=>'This is the fourth one to many post']);

    $user->post()->save($post);
});

Route::get('/read', function() {
    $user = User::findOrFail(2);

    foreach($user->post as $post) {
        echo "title : ".$post->title."<br> content: ".$post->body."<br>";
    }
});

Route::get('/update', function() {
    $user = User::findOrFail(1);
    $user->post()->where('id', '=', 2)->update(['title'=>'Second post la!']);
});

Route::get('/delete', function() {
    $user = User::findOrFail(2);
    $user->post()->whereId(3)->delete();
});
