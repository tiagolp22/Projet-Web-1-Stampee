<?php

use App\Controllers;
use App\Routes\Route;

//Home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


//User
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/user', 'UserController@index');

Route::get('/user/show', 'UserController@show');

Route::get('/user/edit', 'UserController@edit');
Route::post('/user/edit', 'UserController@update');

Route::post('/user/delete', 'UserController@delete');


//Login
Route::get('/login', 'AuthController@index');

Route::post('/login', 'AuthController@store');

Route::get('/logout', 'AuthController@delete');


//Product - Timbre
Route::get('/product', 'ProductController@index');
Route::get('/product/index', 'ProductController@index');
Route::get('/product/show', 'ProductController@show');

Route::get('/product/create', 'ProductController@create');
Route::post('/product/create', 'ProductController@store');

Route::get('/product/edit', 'ProductController@edit');
Route::post('/product/edit', 'ProductController@update');

Route::post('/product/delete', 'ProductController@delete');


// Enchere
Route::get('/enchere', 'EnchereController@index');
Route::get('/enchere/index', 'EnchereController@index');
Route::get('/enchere/show', 'EnchereController@show');

Route::get('/enchere/create', 'EnchereController@create');
Route::post('/enchere/create', 'EnchereController@store');

Route::get('/enchere/edit', 'EnchereController@edit');
Route::post('/enchere/edit', 'EnchereController@update');

Route::post('/enchere/delete', 'EnchereController@delete');



//MISE
Route::get('/mise', 'MiseController@index');
Route::get('/mise/index', 'MiseController@index');
Route::get('/mise/show', 'MiseController@show');

Route::get('/mise/create', 'MiseController@create');
Route::post('/mise/store', 'MiseController@store');


//Favoris
Route::get('/favoris', 'FavorisController@index');
Route::get('/favoris/index', 'FavorisController@index');

Route::post('/favoris/store', 'FavorisController@store');

Route::post('/favoris/delete', 'FavorisController@delete');

//PAGES
Route::get('/apropos', 'AproposController@index');
Route::get('/', 'AproposController@index');


Route::get('/contact', 'ContactController@index');
Route::get('/', 'ContactController@index');


Route::dispatch();
