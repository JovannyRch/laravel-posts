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

Route::get('/','web\WebController@index')->name('home');
Route::get('/detail/{id}','web\WebController@detail')->name('detail');
Route::get('/category/{id}','web\WebController@category')->name('category');
Route::get('/contact','web\WebController@contact')->name('contact');
Route::get('/categories','web\WebController@categories')->name('categories');
/* 


Route::get('/saluda/{nombre}', function ($nombre) {
    return "hola $nombre:  <a href=".route('nosotros').">Conocenos</a>";
});

Route::get('sobre-nosotros-jaja', function () {
    return "<h1>Sobre nosotros</h1>";
})->name('nosotros');


Route::get('/home/{nombre?}/{apellido?}', function ($nombre = "Jovanny", $apellido="Ramírez") {
   $post = array(
       'post1',
       'post2',
       'post3',
       'post3',
       'post4'
   );
    $data = array(
       'nombre' => $nombre,
       'apellido' => $apellido,
       'publicaciones' => $post
   );

    return view('home',$data);
})->name('home');

Route::get('index', 'PostController@index');
 */

 Route::resource('dashboard/post', 'dashboard\PostController');
 Route::resource('dashboard/user', 'dashboard\UserController');
 Route::post('dashboard/post/{post}/image', 'dashboard\PostController@image')->name('post.image');

 Route::resource('dashboard/category', 'dashboard\CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
