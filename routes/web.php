<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers')->prefix('admin')->group(function () {
    Route::get('/', 'Main\IndexController@index')->name('main.index');
    Route::resource('category', 'CategoryController');
    Route::post('/category/restore/{category}', 'CategoryController@restore')->name('category.restore');
    Route::resource('tag', 'TagController');
    Route::post('/tag/restore/{tag}', 'TagController@restore')->name('tag.restore');
    Route::resource('user', 'UserController');
    Route::post('/user/restore/{user}', 'UserController@restore')->name('user.restore');
    Route::resource('color', 'ColorController');
    Route::post('/color/restore/{color}', 'ColorController@restore')->name('color.restore');
    Route::resource('product', 'ProductController');
    Route::post('/product/restore/{product}', 'ProductController@restore')->name('product.restore');
    Route::resource('group', 'GroupController');
    Route::post('/group/restore/{group}', 'GroupController@restore')->name('group.restore');
});
