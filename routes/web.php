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
// projects that are public, used for guests
Route::get('/projects/public', 'ProjectController@guest');

// project
Route::get('/project/{project}', 'ProjectController@show');
// delete project
Route::get('/project/delete/{project}', 'ProjectController@delete');
// add file to project
Route::get('/project/add/file/{project}', 'FileController@store');
// set project as complete or incomplete
Route::post('/project/{project}/complete', 'ProjectController@setCompleteness');
// add a collaborator to a project
Route::post('/project/{project}/add-collaborator', 'CollaboratorController@store');
// remove a collaborator from a project
Route::post('/project/{project}/remove-collaborator/{user}', 'CollaboratorController@delete');
// change the name of a project
Route::post('/project/{project}/change-name', 'ProjectController@changeName');

// login and register
Auth::routes();
Route::get('/account', 'HomeController@index')->name('account');

// login and register routes; also pages that are for logged in users only
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account', 'HomeController@account')->name('account');
Route::get('/organization', 'HomeController@organization')->name('organization');
Route::get('/projects', 'HomeController@projects')->name('projects');
Route::get('/successverification', function() {
	return view('vendor.laravel-user-verification.successverification');
});
//Route::group(['middleware' => ['isVerified']], function ()) 

// to be shortened
Route::get('/', function () {return view('welcome');});
Route::get('/welcome', function () {return view('welcome');});
Route::get('/home', function () {return view('home');});
Route::get('/organization', function () {return view('organization');});
Route::get('/contact', function () {return view('contact');});
Route::get('/sample', function () {return view('sample');});
Route::get('/admin', function () {return view('admin');});
Route::get('/contact', function () {return view('contact');});
Route::get('/search', function () {return view('search');});
Route::get('/sample', function () {return view('sample');});
Route::get('/messages', function () {return view('messages');});