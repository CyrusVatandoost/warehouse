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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/projects', function () {

	// query to fetch all projects ordered from latest
	$project_list = DB::table('project')->latest()->get();

    return view('projects', compact('project_list'));
});

Route::get('/project/{id}', function ($id) {

	$project = DB::table('project')->find($id);

    return view('project', compact('project'));
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/organization', function () {
    return view('organization');
});

Route::get('/contact', function () {
    return view('contact');
});