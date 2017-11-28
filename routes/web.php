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
//Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');

// project
Route::get('/project/{project}', 'ProjectController@show');
Route::get('/project/delete/{project}', 'ProjectController@delete');

// login and register?
Auth::routes();
Route::get('/account', 'HomeController@index')->name('account');

// login and register routes; also pages that are for logged in users only
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account', 'HomeController@account')->name('account');
Route::get('/organization', 'HomeController@organization')->name('organization');
Route::get('/projects', 'HomeController@projects')->name('projects');

// to be shortened
Route::get('/', function () {return view('welcome');});
Route::get('/welcome', function () {return view('welcome');});

Route::get('/home', function () {return view('home');});
Route::get('/organization', function () {return view('organization');});
Route::get('/contact', function () {return view('contact');});
Route::get('/sample', function () {return view('sample');});
Route::get('/admin', function () {return view('admin');});
//Route::get('/home', function () {return view('home');});
//Route::get('/organization', function () {return view('organization');});
Route::get('/contact', function () {return view('contact');});
Route::get('/sample', function () {return view('sample');});