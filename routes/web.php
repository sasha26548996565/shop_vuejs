<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers')->prefix('admin')->group(function () {
    Route::get('/', 'Main\IndexController@index')->name('main.index');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('user', 'UserController');
    Route::resource('color', 'ColorController');
});
