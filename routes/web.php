<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('layouts.dashboard');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});

// Route::get('profile/create/{id}', function($id){
//     echo $id;
//     return view('profile.createprofile');
// });
// Route::get('/users', function(){
//     $users = DB::table('users')->get();
//     return view('user.userlist', ['users'=> $users]);
// });


Route::resource('user', UserController::class);

Route::resource('profile', ProfileController::class);

Route::get('/checkfail', function (){
    echo "checkfail page";
    //return view('layouts.dashboard');
});
Route::get('checkage/{age?}', function ($age) {
    echo $age;
    //return view('layouts.dashboard');
})->middleware(\App\Http\Middleware\CheckAge::class);



