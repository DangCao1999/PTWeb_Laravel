<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function()
{
    return view("auth.login");
});

// Route::get('/dashboard', function () {
//     return view('product.index');
// });

// Route::get('profile/create/{id}', function($id){
//     echo $id;
//     return view('profile.createprofile');
// });
// Route::get('/users', function(){
//     $users = DB::table('users')->get();
//     return view('user.userlist', ['users'=> $users]);
// });

Route::delete('order/{oid}/product/{pid}', [OrderController::class, "deleteProduct"])->name("order.deleteProduct");

Route::resource('user', UserController::class)->middleware(['auth', 'role:admin']);

Route::resource('profile', ProfileController::class);

Route::resource('product', ProductController::class)->middleware(['auth', 'role:admin,editor']);

Route::resource('order', OrderController::class)->middleware(['auth', 'role:admin,editor']);

Route::get('/checkfail', function (){
    echo "checkfail page";
    //return view('layouts.dashboard');
});

Route::post('/order/filter', [OrderController::class, 'filter'])->name('order.filter');

Route::get('checkage/{age?}', function ($age) {
    echo $age;
    //return view('layouts.dashboard');
})->middleware(\App\Http\Middleware\CheckAge::class);

Auth::routes();

Route::get('/home',function()
{
 return view('product.index');
});
