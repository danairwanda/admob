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
	Route::get('users','UserController@index');
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
});

