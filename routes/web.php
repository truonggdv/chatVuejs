<?php

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(array('middleware' => 'auth'), function () {
    Route::get('/chat',function(){
        $user = \App\User::all();
        return view('chat',compact('user'));
    });
    Route::post('/message', 'MessageController@postMessage');
    Route::get('/logout',function(){
        Auth::logout();
        return redirect()->back();
    });
});
