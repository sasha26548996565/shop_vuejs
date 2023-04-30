<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/products', 'ProductController@index');
Route::get('/products/show/{product}', 'ProductController@show');
Route::get('/filters/list', 'FilterListController@index');
