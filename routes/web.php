<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/langkahPertama', function () {
    return view('langkahPertama');
});



//the magic off laravel
Route::resource('article', 'ArticleController');


Route::get('/', 'ArticleController@index');
// Route::get('/article', 'ArticleController@index'); //memanggil controller article dengan method index
// Route::get('/article/create', 'ArticleController@create');
// Route::get('/article/{slug}', 'ArticleController@show');
// Route::post('/article', 'ArticleController@store');
// Route::get('/article/{id}/edit', 'ArticleController@edit'); //memakai parameter id karena dinamis
// Route::put('/article/{id}', 'ArticleController@update');
// Route::delete('/article/{id}', 'ArticleController@destroy');
