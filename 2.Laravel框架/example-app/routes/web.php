<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Tag;
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

// Route::resource('posts', '\App\Http\Controllers\PostsController');

// Route::get('/contact', '\App\Http\Controllers\PostsController@contact');

// Route::get('post/{id}', '\App\Http\Controllers\PostsController@show_post');

// Route::get('post/{id}/{name}/{password}', '\App\Http\Controllers\PostsController@post_detail');


/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function() {
//   DB::insert('insert into posts(title, content) value(?, ?)', ['PHP with laravel', 'Laravel is the best thing that has happened to PHP']);
// });

// Route::get('/read', function() {
//   $result = DB::select('Select * from posts where id = ?', [1]);

//   foreach($result as $post){
//     return $post->title.'<br>'.$post->content;
//   };
// });

// Route::get('/update', function() {
//   $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);
//   return $updated;
// });

// Route::get('/delete', function() {
//   $deleted = DB::delete('Delete from posts Where id = ?', [2]);
//   return $deleted;
// });


/*
|--------------------------------------------------------------------------
| ELOQUENT ORM(OBJECT RELATION MODEL)
|--------------------------------------------------------------------------
*/

// Route::get('/read', function() {
//   $posts = Post::find(4);
//   return $posts -> title;
// });

// Route::get('/findwhere', function() {
//   $posts = Post::where('id', 4)->orderBy('id', 'desc')->take(1)->get();

//   return $posts;
// });

// Route::get('/findmore', function() {
// //   $posts = Post::findOrFail(1);

// //   return $posts;

//     $posts = Post::where('id', '<', 50)->firstOrFail();

//     return $posts;
// });

// Route::get('/basicinsert', function() {
//     $posts = new Post;

//     $posts->title = 'New ORM title insert';
//     $posts->content = 'Elequent is too hard to me...';

//     $posts->save();
// });

// Route::get('/basicupdate', function() {
//     $posts = Post::find(6);

//     $posts->title = 'New ORM title insert 2';
//     $posts->content = 'Elequent is too hard to me... 2';

//     $posts->save();
// });

// Route::get('/create', function() {
//     Post::create(['title'=>'the create method', 'content'=>'I want to learn more thing about PHP Laravel']);
// });

// Route::get('/update', function() {
//     Post::where('id', 4)->where('is_admin', 0)->update(['title'=>'NEW PHP TITLE', 'content'=>'I love the php laravel']);
// });

// Route::get('/delete', function() {
//     $posts = Post::find(4);

//     $posts->delete();
// });

// Route::get('/delete1', function() {
//     // Post::destroy([6,7]);

//     Post::where('is_admin', 0)->delete();
// });

// Route::get('/softdelete', function() {
//     Post::find(3)->delete();
// });

// Route::get('/readsoftdelete', function() {
//     // $posts = Post::find(1);
//     // return $posts;

//     // $posts = Post::withTrashed()->where('is_admin', 0)->get();
//     // return $posts;

//     $posts = Post::onlyTrashed()->get();
//     return $posts;
// });


// Route::get('/restore', function() {
//     Post::withTrashed()->where('is_admin', 0)->restore();
// });

// Route::get('/forcedelete', function() {
//     // Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
//     $posts = Post::onlyTrashed()->where('is_admin', 0)->get();
//     return $posts;
// });


/*
|--------------------------------------------------------------------------
| ELOQUENT RELATIONSHIPS
|--------------------------------------------------------------------------
*/

// One to one relationship
// Route::get('/user/{id}/post', function($id) {
//     return User::find($id)->post;
// });

// Route::get('/post/{id}/user', function($id) {
//     return Post::find($id)->user->name;
// });


// One to many relationship
// Route::get('/posts', function() {
//     $user = User::find(1);

//     foreach($user->posts as $post) {
//         echo $post->title."<br>";
//     }
// });


// Many to many relationship
// Route::get('/user/{id}/role', function($id) {
//     // $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
//     $user = User::find($id);

//     foreach($user->roles as $role) {
//         echo $role->pivot;
//     }
//     // return $user;
// });

// Accessing the intermeidate table / pivot
// Route::get('/user/pivot', function() {
//     $user = User::find(1);

//     foreach($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }
// });


// Route::get('/user/country', function() {
//     $country = Country::find(3);

//     foreach($country->posts as $post) {
//         return $post;
//     }
// });


// Polymorphic relationship
// Route::get('/user/photos', function() {
//     $user = User::find(1);
//     foreach($user->photos as $photo) {
//         echo $photo->path."<br>";
//     }
// });

// Route::get('/post/photos', function() {
//     $post = Post::find(1);
//     foreach($post->photos as $photo) {
//         return $photo->path;
//     }
// });

// Route::get('/photo/{id}', function($id) {
//     $photo = Photo::findOrFail($id);

//     return $photo->imageable;
// });

// Polymorphic Many to Many relationship
Route::get('/video/{id}/tag', function($id) {
    $video = Video::find($id);
    foreach($video->tags as $tag) {
        echo $tag->name."<br>";
    }
});

Route::get('/post/{id}/tag', function($id) {
    $post = Post::find($id);
    foreach($post->tags as $tag) {
        echo $tag->name."<br>";
    }
});

Route::get('/tag/{id}/video', function($id) {
    $tag = Tag::find($id);
    foreach($tag->videos as $video) {
        echo $video."<br>";
    }
    foreach($tag->posts as $post) {
        echo $post."<br>";
    }
});
