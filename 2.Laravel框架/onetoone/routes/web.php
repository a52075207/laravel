<?php

use Illuminate\Support\Facades\Route;
// use  Illuminate\Support\Facades\DB;
use App\Models\Address;
use App\Models\User;

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
//     return view('welcome');
// });

Route::get('/insert', function() {
    $user = User::findOrFail(3);
    $address = new Address(['name'=>'Taipei']);
    $user->address()->save($address);
});

Route::get('/update', function() {
    $address = Address::whereUserId(1)->first();
    $address->name = "New Taipei City";
    $address->save();
});

Route::get('/delete', function() {
    $user = User::findOrFail(1);
    $user->address()->delete();
    return "Delete complete!";
});
