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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', 'App\Http\Controllers\admincontroller@Logout')->name('admin.logout');

Route::prefix('users')->group(function(){
    Route::get('/view', 'App\Http\Controllers\Backend\UserController@UserView')->name('user.view');
    Route::get('/add', 'App\Http\Controllers\Backend\UserController@UserAdd')->name('user.add');
    Route::post('/store', 'App\Http\Controllers\Backend\UserController@UserStore')->name('user.store');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\UserController@UserEdit')->name('user.edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Backend\UserController@UserUpdate')->name('user.update');
    Route::get('/delete/{id}','App\Http\Controllers\Backend\UserController@UserDelete')->name('user.delete');
});
Route::prefix('profile')->group(function(){
    Route::get('/view', 'App\Http\Controllers\Backend\ProfileController@ProfileView')->name('profile.view');
    Route::get('/edit', 'App\Http\Controllers\Backend\ProfileController@ProfileEdit')->name('profile.edit');
    Route::post('/store','App\Http\Controllers\Backend\ProfileController@ProfileStore')->name('profile.store');
    Route::get('/password/view', 'App\Http\Controllers\Backend\ProfileController@PasswordView')->name('password.view');
    Route::post('/password/update', 'App\Http\Controllers\Backend\ProfileController@PasswordUpdate')->name('password.update');
});