<?php
use App\Controllers;
use App\Routes\Route;

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');

Route::get('/client', 'ClientController@index');
Route::get('/client/show', 'ClientController@show');

Route::get('/client/create', 'ClientController@create');
Route::post('/client/create', 'ClientController@store');

Route::get('/client/edit', 'ClientController@edit');
Route::post('/client/edit', 'ClientController@update');

Route::post('/client/delete', 'ClientController@delete');


Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');


Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::get('/product/create', 'ProductController@create');
Route::post('/product/create', 'ProductController@store');


Route::get('/user', 'UserController@index');
Route::get('/user/show', 'UserController@show');



Route::dispatch();
?>

