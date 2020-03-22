<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::resource('post', 'api\PostController')->only(['index','show']);
Route::get('post/{category}/category', 'api\PostController@category');
Route::get('post/{url_clean}/url_clean', 'api\PostController@url_clean');
Route::get('category', 'api\CategoryController@index');
Route::get('category', 'api\CategoryController@index');
Route::get('category/all', 'api\CategoryController@all');