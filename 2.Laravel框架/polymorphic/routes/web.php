<?php

use Illuminate\Support\Facades\Route;
use App\Models\Photo;
use App\Models\Staff;
use App\Models\Product;
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
    $staff = Staff::findOrFail(1);

    $staff->photos()->create(['path'=>'assignment.jpg']);
});


Route::get('/read', function() {
    // $staff = Staff::findOrFail(1);

    // foreach($staff->photos as $photo) {
    //     return $photo->path;
    // }

    $photo = Photo::find(2);
    return $photo->imageable->name;
});


Route::get('/update', function() {
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->whereId(2)->first();
    $photo->path = 'change.jpg';
    $photo->save();
});

Route::get('/delete', function() {
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->whereId(1)->first();
    return $photo->delete();
});

Route::get('/assign', function() {
    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(4);

    $staff->photos()->save($photo);
});

Route::get('/unassign', function() {
    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(4)->update(['imageable_id'=>0, 'imageable_type'=>0, 'updated_at'=>Null]);
});
