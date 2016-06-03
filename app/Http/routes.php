<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PageController@index')->name('index');
// List all project
Route::get('projects', ['as' => 'project.index', 'uses' => 'Project\ProjectController@all']);


Route::group(['middleware' => ['guest']], function () {
	Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
	Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
	Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

	// Registration Routes...
	Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
	Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

	// Password Reset Routes...
	Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
	Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
	Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

});

Route::group(['middleware' => ['auth']], function () {
    // Users
    Route::get('@{username}', 'User\UserController@profile')->name('user.profile');
	
    // Projects
    Route::get('projects/create', ['as' => 'project.create', 'uses' => 'Project\ProjectController@create']);
    Route::post('projects/create', ['as' => 'project.create', 'uses' => 'Project\ProjectController@store']);
    
	// Rate
    Route::get('projects/{id}', ['as' => 'project.show', 'uses' => 'Project\ProjectController@show']);
    Route::post('projects/{id}/rate', ['as' => 'project.rate', 'uses' => 'Project\ProjectController@rate']);

    // Topic
    Route::get('projects/{id}/topic/create', ['as' => 'project.topic.create', 'uses' => 'Topic\TopicController@create']);
    Route::post('projects/{id}/topic/create', ['as' => 'project.topic.create', 'uses' => 'Topic\TopicController@store']);
    Route::get('projects/{id}/topic/{topic_id}', ['as' => 'project.topic.show', 'uses' => 'Topic\TopicController@show']);
    

    Route::get('projects/{id}/destroy', ['as' => 'project.destroy', 'uses' => 'Project\ProjectController@destroy']);

    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);
});