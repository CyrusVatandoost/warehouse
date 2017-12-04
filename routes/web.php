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
	// create a new project
	Route::post('/projects', 'ProjectController@store');
	// projects that are public, used for guests
	Route::get('/projects/public', 'ProjectController@guest');

// project
	// show a project through ID
	Route::get('/project/{project}', 'ProjectController@show');
	// delete project
	Route::get('/project/delete/{project}', 'ProjectController@delete');
	// add file to project
	Route::get('/project/add/file/{project}', 'FileController@store');
	// set project as complete or incomplete
	Route::post('/project/{project}/complete', 'ProjectController@setCompleteness');
  // set project's visibility
  Route::get('/project/{project}/change-visibility', 'ProjectController@setVisibility');
	// add a collaborator to a project
	Route::post('/project/{project}/add-collaborator', 'CollaboratorController@store');
	// remove a collaborator from a project
	Route::post('/project/{project}/remove-collaborator/{user}', 'CollaboratorController@delete');
	// change the name of a project
	Route::post('/project/{project}/change-name', 'ProjectController@changeName');
	// upload a file to the project
	Route::post('/project/{project}/upload-file', 'FileController@store');

// announcement
	//create an announcement
	Route::post('/announcement/create', 'AnnouncementController@store');
	//announcement
	Route::get('/announcement/{announcement}', 'AnnouncementController@show');
	//show all announcements
	Route::get('/home', 'AnnouncementController@index');

// login and register
Auth::routes();
Route::get('/account', 'HomeController@index')->name('account');
Route::get('/account/edit', function () {return view('account.edit');});
Route::post('/account/{user}/upload-avatar', 'UserController@updateAvatar');

//Messenger Routes
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

//Auto Complete Routes
Route::get('/user/autocomplete', function() {
	return App\User::all();
});

//Contact Us Routes
Route::post('/sendtoadmin', 'MessagesController@adminSend');

//pages that are for logged in users only
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
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
//Route::get('/home', function () {return view('home');});
Route::get('/organization', function () {return view('organization');});
Route::get('/contact', function () {return view('contact');});
Route::get('/announcement', function () {return view('announcement');});
Route::get('/admin', function () {return view('admin');});
Route::get('/contact', function () {return view('contact');});
Route::get('/search', function () {return view('search');});
Route::get('/sample', function () {return view('sample');});