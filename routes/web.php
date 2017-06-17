<?php




Route::post('/position', 'PositionController@store');
Route::get('/position', 'PositionController@show');


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('glogin',array('as'=>'glogin','uses'=>'GoogleConnexionController@googleLogin')) ;
Auth::routes();

Route::get('register/verify/{confirmationToken}', 'Auth\RegisterController@confirm');


Route::group(['middleware' => ['auth.active']], function () {
	Route::get('/', 'HomeController@index');

	Route::group(['middleware' => ['auth']], function () {
		Route::get('/invitation/{group}', 'InvitationsController@show');
		Route::get('/join/{group}', 'InvitationsController@join');
		Route::get('/settings', 'SettingsController@edit');
		Route::post('/settings','SettingsController@update');
		Route::get('/members/token/{token}', 'GroupsController@addTokenMembers');
		Route::get('/pending-aed', 'PendingAedsController@getList');
		Route::get('/pending-aed/{pending}', 'PendingAedsController@show');		
		Route::get('/validate-aed', 'PendingAedsController@getValidate');
		Route::get('/validate-aed/{pending}', 'PendingAedsController@showValidate');
	});
});
Route::get('/validate', 'HomeController@msgValidateAccount');
Route::get('/aedinfo/{aed}', 'AedController@getAedInfo');
/*
 * Pending AEDS
 **********************************************/
Route::post('/pending-aeds','PendingAedsController@store');

Route::group(['prefix' => 'admin','middleware' => ['admin.auth']], function () {

	//Admin Dashboard (Super Admin - Admin)
	//======================================
	Route::get('/', 'AdminController@dashboard');

	/*
	 * Aeds
	 **********************************************/
	Route::get('/aeds', 'Admin\AedController@getList');
	Route::get('/aed/validate/{pendingAed}/{aedname}', 'Admin\AedController@control');
	Route::get('/aed/refuse/{pendingAed}/{aedname}', 'Admin\AedController@refuseControl');
	Route::get('/aed/{aed}', 'Admin\AedController@show');
	Route::delete('/aed/{aed}', 'Admin\AedController@destroy');

	/*
	 * Pending Aeds
	 **********************************************/
	Route::get('/pending-aeds', 'Admin\PendingAedsController@getList');
	Route::get('/pending-aed/{pendingAed}', 'Admin\PendingAedsController@show');


	Route::get('/members/add/{group}', 'Admin\GroupsController@addMembers');

	Route::post('/members/invite/{group}', 'Admin\GroupsController@inviteMember');
	Route::get('/members/{group}', 'Admin\GroupsController@getMembers');
	Route::delete('/member/{groupRelation}', 'Admin\GroupsController@removeMember');
	Route::get('/group/{group}', 'Admin\GroupsController@show');
		
	Route::group(['middleware' => ['superadmin.auth']], function () {
		/*
		 * Scores
		 **********************************************/
		Route::get('/scores', 'Admin\ScoresController@getList');
		Route::get('/score', 'Admin\ScoresController@create');
		Route::get('/score/{score}', 'Admin\ScoresController@show');
		Route::post('/score/{score}', 'Admin\ScoresController@update');

		/*
		 * Groups
		 **********************************************/

		Route::get('/groups', 'Admin\GroupsController@getList');
		Route::get('/group', 'Admin\GroupsController@create');

		Route::post('/group', 'Admin\GroupsController@store');
		Route::post('/group/{group}', 'Admin\GroupsController@update');
		Route::delete('/group/{group}', 'Admin\GroupsController@destroy');
		Route::post('/groups/search', 'Admin\GroupsController@searchGroup');

		/*
		 * Users
		 **********************************************/
		Route::get('/users', 'Admin\UsersController@getList');
		Route::get('/user/{user}', 'Admin\UsersController@show');
		Route::delete('/user/{user}', 'Admin\UsersController@destroy');
		Route::post('/users/search', 'Admin\UsersController@searchUser');
	});


	//validate pending aeds
	Route::get('/validate/{pendingAed}', 'Admin\PendingAedsController@validateAED');
	Route::get('/complete/{pendingAed}', 'Admin\PendingAedsController@completeAED');

});


        /* Location */
        Route::get('/location/reset', 'LocationController@resetLocation');
        Route::get('/distance/set/{value}/{location?}', 'LocationController@setDistance');
        /* Ajax */
        Route::post('/location/set', 'LocationController@setLocation');


