<?php
/* | middleware default "WEB" : memeriksa Session CSRF, kernel HTTP, dll | */
Route::group(['middleware' => 'web'], function(){
	/*  | redirect ke halaman login */
	// Route::auth();
});
// // Authentication Routes..
// $this->get('login','Auth\AuthController@showLoginForm');
// $this->post('login','Auth\AuthController@login');
// $this->get('logout','Auth\AuthController@logout');
// // Registration Routes..
// $this->get('register','Auth\AuthController@showRegistrationForm');
// $this->post('register','Auth\AuthController@register');
// // Password Reset Routes..
// $this->get('password/reset/{token?}','Auth\PasswordController@showResetForm');
// $this->post('password/email','Auth\PasswordController@sendResetLinkEmail');
// $this->post('password/reset','Auth\PasswordController@reset');
// User Management Routes..
// Route::get('/users','UserController@create');
Route::auth();
// Route::resource('/users','UserController');
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
// $this->post('register','Auth\AuthController@register');

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
		// $this->post('register','Auth\AuthController@register');
		// $this->post('register','Auth\AuthController@register');
	});
});
/* | url /admin hanya bisa diakses oleh user yang sudah login sebagai admin | */
Route::get('admin', ['middleware' => ['web','auth','admin'], function(){
	return view('admin/admin_home');
}]);

// Route::get('/user	','UserController@index');