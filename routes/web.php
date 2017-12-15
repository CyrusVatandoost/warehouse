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
	Route::get('/project/{project}/beta', 'ProjectController@beta');
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
	// add a task to a project
	Route::post('/project/{project}/tasks', 'TaskController@store');
	// set project task as complete
	Route::post('/project/task/{task}/complete', 'TaskController@setCompleteness');
	
	Route::get('/searchproject/json', 'ProjectController@getAllPublicProjectsJSON');
	Route::post('/search', 'ProjectController@getUsersAndProjectsRelatedToPhrase');
	Route::post('/search/filtertag', 'ProjectController@getProjectsByTag');
	
	Route::get('/project/{project}/feature', 'ProjectController@feature');
	Route::get('/project/{project}/unfeature', 'ProjectController@unfeature');
	Route::post('/project/{project}/abstract-add', 'ProjectController@storeAbstract');
	Route::post('/project/{project}/update-description', 'ProjectController@updateDescription');
	Route::post('/project/{project}/head-add', 'ProjectHeadController@store');
	Route::post('/project/{project}/head-remove/{user}', 'ProjectHeadController@remove');

// file
	Route::post('/project/{project}/upload-file', 'FileController@store');
	Route::get('/project/{project}/delete-file/{file}', 'FileController@delete');
	Route::get('/project/{project}/file-archive/{file}', 'FileController@archive');
	Route::post('/project/{project}/banner-update', 'FileController@updateBanner');
	Route::post('/project/{project}/file-rename/{file}', 'FileController@rename');

//Positions
	Route::post('/organization/{organization}/remove-position','OrganizationPositionController@delete');
	Route::post('/organization/add-position','OrganizationPositionController@store');

// post
	Route::post('/project/{project}/remove-tag/{tag}', 'TagController@delete');
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

// notification
	Route::get('/notifications', 'NotificationController@showNotifs');

// admin
	Route::get('/admin', 'DashboardController@index');
	Route::get('/archive/delete/{file}', 'FileController@deleteArchive');
	Route::get('/archive/restore/{file}', 'FileController@restoreArchive');
	Route::get('/admin/approve/{id}/mail/{email}', 'AdminController@approveUser');
	Route::get('/admin/disapprove/{id}/mail/{email}', 'AdminController@disapproveUser');
	Route::post('/admin/delete', 'AdminController@delete');
	Route::post('/admin/store','AdminController@store');
	Route::get('/admin/disapprove/{id}/mail/{email}', 'AdminController@disapproveUser');
	Route::post('/admin/{user}/delete-user-position','AdminController@deletePosition');
	Route::post('/admin/remove/{user}','AdminController@removeAdmin');
	Route::post('/admin/assign-user-position','AdminController@addPosition');

// dashboard
	Route::get('/admin/organization', 'DashboardController@organization');
	Route::get('/admin/projects', 'DashboardController@projects');
	Route::get('/admin/users', 'DashboardController@users');
	Route::post('/organization/{organization}/details-update', 'OrganizationController@update');
	Route::post('/user/new', 'UserController@store');

// archive
	Route::get('/admin/file-archive', 'ArchiveController@files');
	Route::get('/admin/logs', 'LogController@index');

// login and register
	Auth::routes();
	Route::get('/account', 'UserController@auth');
	Route::get('/account/edit', 'UserController@edit');
	Route::get(' account/settings', 'UserController@settings');
	Route::get(' account/history', 'UserController@history');
	Route::get('/account/{user}', 'UserController@show');
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
Route::get('/organization', 'HomeController@organization')->name('organization');
Route::get('/projects', 'HomeController@projects')->name('projects');
Route::get('/successverification', function() {
	return view('vendor.laravel-user-verification.successverification');
});

Route::post('/project/{project}/abstract-edit', 'EditorController@edit');
Route::post('/project/{project}/abstract-update', 'EditorController@update');

// to be shortened
Route::get('/', 'HomeController@welcome');
Route::get('/welcome', 'HomeController@welcome');

Route::get('/organization', function () {return view('organization');});
Route::get('/contact', function () {return view('contact');});
Route::get('/announcement', function () {return view('announcement');});
Route::get('/contact', function () {return view('contact');});
Route::get('/sample', function () {return view('sample');});
Route::get('/about', function () {return view('about');});
