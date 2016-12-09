<?php
/* | middleware default "WEB" : memeriksa Session CSRF, kernel HTTP, dll | */
Route::group(['middleware' => 'web'], function(){
	/*  | redirect ke halaman login */
	// Route Users
});
Route::auth();
Route::get('/password/{id}/edit', [
	'as'	=>	'password',
	'uses'	=> 	'UserController@editPassword'
]);
Route::post('/password/{id}', [
	'as'	=>	'updatePassword',
	'uses'	=>	'UserController@updatePassword'
]);
/* | url ini hanya bisa diakses oleh user yang sudah login | */
Route::group(['middleware' => ['web','auth']], function(){
	Route::get('/home', 'HomeController@index');
	Route::get('/', function(){
		if (Auth::user()->isadmin == 1) {
			/* | untuk user login : admin | */
			return view('admin.admin_home');
		}else{
			/* | untuk user login : user biasa| */
			return view('users.user_home');
		}
	});
	
});
/* | url /admin hanya bisa diakses oleh user yang sudah login sebagai admin | */
Route::get('admin', ['middleware' => ['web','auth','admin'], function(){
	return view('admin/admin_home');
}]);

Route::group(['middleware' => ['web','auth','admin']], function(){
	Route::get('users', [
		'as'	=> 'users',
		'uses' 	=> 'UserController@index'
	]);
	Route::get('users/create', [
	    'as' 	=> 'create', 
	    'uses' 	=> 'UserController@create'
	]);
	Route::post('users/store',[
		'as'	=>	'store',
		'uses'	=>  'UserController@store'
	]);
	Route::get('users/{id}/edit', [
		'as'	=> 	'edit',
		'uses'	=>	'UserController@edit'
	]);
	Route::post('users/{id}', [
		'as'	=>	'update',
		'uses'	=>	'UserController@update'
	]);
	Route::delete('users/{id}',[
		'as'	=> 	'delete',
		'uses'	=>	'UserController@destroy'
	]);	
	Route::get('users/search', [
		'as'	=> 'cariuser',
		'uses'	=> 'UserController@search'	
	]);
	// Route Application
	Route::get('applications', 'ApplicationController@index');
	Route::get('applications/create',[
		'as'	=>	'createApp',
		'uses'	=>	'ApplicationController@create'
	]);
	Route::post('applications/store', [
		'as'	=>	'storeApp',
		'uses'	=>	'ApplicationController@store'
	]);	
	Route::get('applications/{id}/edit', [
		'as'	=>	'editApp',
		'uses'	=>	'ApplicationController@edit'
	]);
	Route::post('applications/{id}', [
		'as'	=>	'updateApp',
		'uses'	=>	'ApplicationController@update'
	]);
	Route::delete('applications/{id}', [
		'as'	=>	'deleteApp',
		'uses'	=>	'ApplicationController@destroy'
	]);
	Route::get('applications/search', [
		'as'	=>	'cariaplikasi',
		'uses'	=>	'ApplicationController@search'
	]);
	// Route adunit
	Route::get('adunit','AdUnitController@index');
	Route::get('adunit/create', [ 
		'as'	=>	'createUnit',
		'uses'	=>	'AdUnitController@create'
	]);
	Route::post('adunit/store', [
		'as'	=>	'storeUnit',
		'uses'	=>	'AdUnitController@store'
	]);
	Route::get('adunit/{id}/edit', [
		'as'	=>	'editUnit',
		'uses'	=>	'AdUnitController@edit'
	]);
	Route::post('adunit/{id}', [
		'as'	=>	'updateUnit',
		'uses'	=>	'AdUnitController@update'
	]);
	Route::delete('adunit/{id}', [
		'as'	=>	'deleteUnit',
		'uses'	=>	'AdUnitController@destroy'
	]);
	Route::get('adunit/search', [
		'as'	=>	'cariunit',
		'uses'	=>	'AdUnitController@search'
	]);
	// Project Route..
	Route::get('projects','ProjectController@index');
	Route::get('cariproject','ProjectController@search');
});

