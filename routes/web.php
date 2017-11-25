<?php

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

// projects
Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');

// project
Route::get('/project/{project}', 'ProjectController@show');
Route::get('/project/delete/{project}', 'ProjectController@delete');

Route::get('/home', function () {return view('home');});

// to be shortened
Route::get('/', function () {return view('welcome');});
Route::get('/welcome', function () {return view('welcome');});
Route::get('/login', function () {return view('login');});
Route::get('/account', function () {return view('account');});
Route::get('/organization', function () {return view('organization');});
Route::get('/contact', function () {return view('contact');});