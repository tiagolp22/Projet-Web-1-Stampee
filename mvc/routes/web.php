<?php
use App\Controllers;
use App\Routes\Route;

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/client', 'ClientController@index');
Route::get('/client/show', 'ClientController@show');

Route::get('/client/create', 'ClientController@create');
Route::post('/client/create', 'ClientController@store');

Route::get('/client/edit', 'ClientController@edit');
Route::post('/client/edit', 'ClientController@update');

Route::post('/client/delete', 'ClientController@delete');

//User
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

//Login
Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');


//Product - Timbre
Route::get('/product/index', 'ProductController@index');
Route::get('/product/show', 'ProductController@show');

Route::get('/product/create', 'ProductController@create');
Route::post('/product/create', 'ProductController@store');

Route::get('/product/edit', 'ProductController@edit');
Route::post('/product/edit', 'ProductController@update');

Route::post('/product/delete', 'ProductController@delete');


// Enchere
Route::get('/enchere', 'EnchereController@index');
Route::get('/enchere/show', 'EnchereController@show');

Route::get('/enchere/create', 'EnchereController@create');
Route::post('/enchere/create', 'EnchereController@store');

Route::get('/enchere/edit', 'EnchereController@edit');
Route::post('/enchere/edit', 'EnchereController@update');

Route::post('/enchere/delete', 'EnchereController@delete');


// Route::get('/user', 'UserController@index');
// Route::get('/user/show', 'UserController@show');



Route::dispatch();
?>

