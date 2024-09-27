<?php
use App\Controllers;
use App\Routes\Route;

Route::get('/', 'AccueilController@index');
Route::get('/apropos', 'AproposController@index');
Route::get('/timbre', 'TimbreController@index');
Route::get('/timbre/create', 'TimbreController@create');
Route::post('/timbre/store', 'TimbreController@store');
Route::get('/timbre/show', 'TimbreController@show');


Route::get('/enchere', 'EnchereController@index');
Route::get('/enchere/create', 'EnchereController@create');
Route::post('/enchere/store', 'EnchereController@store');
Route::get('/enchere/show', 'EnchereController@show');


Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::get('/generate-password', 'UserController@generatePassword');


Route::dispatch();