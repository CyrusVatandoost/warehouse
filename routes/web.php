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
	// archive project
	Route::get('/project/{project}/archive', 'ProjectController@archive');
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
	
	Route::get('/searchproject/json', 'ProjectController@getAllPublicProjectsJSON');

	Route::post('/search', 'ProjectController@getUsersAndProjectsRelatedToPhrase');

	Route::post('/project/{project}/abstract-add', 'ProjectController@storeAbstract');

// file
	// upload a file to the project
	Route::post('/project/{project}/upload-file', 'FileController@store');
	// delete a file from a project
	Route::get('/project/{project}/delete-file/{file}', 'FileController@delete');
	// archive a file
	Route::get('/project/{project}/file-archive/{file}', 'FileController@archive');

//Positions
	//remove a position
	Route::post('/organization/{organization}/remove-position','OrganizationPositionController@delete');
	//add a position
	Route::post('/organization/add-position','OrganizationPositionController@store');

// post
	// remove a tag from a project
	Route::post('/project/{project}/remove-tag/{tag}', 'TagController@delete');
	// add a tag to a project
	Route::post('/project/{project}/add-tag', 'TagController@store');

// announcement
	//create an announcement
	Route::post('/announcement/create', 'AnnouncementController@store');
	//announcement
	Route::get('/announcement/{announcement}', 'AnnouncementController@show');
	//show all announcements
	Route::get('/home', 'AnnouncementController@index');
	//delete an announcement
	Route::get('/announcement/delete/{announcement}', 'AnnouncementController@delete');

// admin
	Route::get('/admin', 'AdminController@show');
	Route::get('/archive/delete/{file}', 'FileController@deleteArchive');
	Route::get('/archive/restore/{file}', 'FileController@restoreArchive');
	Route::get('/admin/approve/{id}/mail/{email}', 'AdminController@approveUser');

// archive
	Route::get('/admin/file-archive', 'ArchiveController@files');

// login and register
	Auth::routes();
	Route::get('/account', 'HomeController@index')->name('account');
	Route::get('/account/edit', function () {return view('account.edit');});
	Route::get('/account/settings', function() {return view('account.settings');});
	Route::post('/account/{user}/upload-avatar', 'UserController@updateAvatar');
	Route::post('/account/{user}/edit-bio', 'UserController@updateBio');
	Route::post('/account/{user}/settings', 'UserController@updatePersonalInfo');

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

Route::post('/project/{project}/abstract-edit', 'EditorController@edit');
Route::post('/project/{project}/abstract-update', 'EditorController@update');

// to be shortened
Route::get('/', function () {return view('welcome');});
Route::get('/welcome', function () {return view('welcome');});
Route::get('/organization', function () {return view('organization');});
Route::get('/contact', function () {return view('contact');});
Route::get('/announcement', function () {return view('announcement');});
Route::get('/contact', function () {return view('contact');});
//Route::get('/search', function () {return view('search');});
Route::get('/sample', function () {return view('sample');});
Route::get('/notifications', function () {return view('notifications');});