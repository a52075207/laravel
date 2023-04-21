<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;
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
    $user = User::find(1);
    $role = new Role(['name'=>'streamer']);
    $user->roles()->save($role);
});

Route::get('/read', function() {
    $user = User::findOrFail(1);

    foreach($user->roles as $role) {
        return $role->name;
    }
});

Route::get('/update', function() {
    $user = User::find(1);

    if($user->has('roles')) {
        foreach($user->roles as $role) {
            if($role->name != 'administrator') {
                $role->name = 'administrator';
                $role->save();
                return $role->name;
            } else {
                $role->name = 'subscriber';
                $role->save();
                return $role->name;
            }
        }
    }
});

Route::get('/delete', function() {
    $user = User::findOrFail(1);

    foreach($user->roles as $role) {
        $role->whereId(4)->delete();
    }
});

// attach() will create another record
// no matter the data is exist in the role_user table

Route::get('/attach', function() {
    $user = User::findOrFail(1);

    $user->roles()->attach(3);
});

// detach() will delete the connection between the user and role table
// if detach() without given the integer, will delete all connection

Route::get('/detach', function() {
    $user = User::findOrFail(1);

    $user->roles()->detach();
});

Route::get('/sync', function() {
    $user = User::findOrFail(1);

    $user->roles()->sync([2]);
});
