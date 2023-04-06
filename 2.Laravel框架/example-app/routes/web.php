<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     // return view('welcome');
//     return "Hello world!";
// });

// Route::get('/about', function () {
//     // return view('welcome');
//     return "About page!";
// });

// Route::get('/contact', function () {
//     // return view('welcome');
//     return "Contact Page!";
// });

// Route::get('/post/{id}/{name}', function($id, $name) {
//     return "This is post ". $id . " ". $name;
// });

// Route::get('admin/posts/example', array('as' =>'admin.home', function() {
//     $url = route('admin.home');
//     return "This url is ". $url;
// }));

// Route::get('admin/posts/example', function() {
//     $url = route('admin.home');
//     return "This url is ". $url;
// }) -> name('admin.home'); 

// Route::get('/post/{id}', '\App\Http\Controllers\PostsController@index');

Route::resource('posts', '\App\Http\Controllers\PostsController');