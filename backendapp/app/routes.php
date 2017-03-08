<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('login');
});

Route::group(array('before' => 'auth|manager'), function() {
	
	Route::get('dashboard',array('as' => 'dashboard', 'uses' => 'UsersController@dashboard'));
    Route::get('comparedata',array('as' => 'comparedata', 'uses' => 'UsersController@comparedata'));
    Route::get('historicaldata',array('as' => 'historicaldata', 'uses' => 'HeartratesController@historicaldata'));
    Route::get('historicaldataall',array('as' => 'historicaldataall', 'uses' => 'HeartratesController@historicaldataall'));
    
});

Route::resource('users', 'UsersController');

Route::resource('emergencies', 'EmergenciesController');

Route::resource('devices', 'DevicesController');

Route::resource('heartrates', 'HeartratesController');

Route::resource('calories', 'CaloriesController');

Route::resource('steps', 'StepsController');

Route::resource('temperatures', 'TemperaturesController');

Route::resource('users', 'UsersController');

Route::get('updateprofilelogged',array('as' => 'updateprofilelogged', 'uses'=>'UsersController@updateprofilelogged'));
Route::get('getupdateprofile',array('as' => 'getupdateprofile', 'uses'=>'UsersController@updateprofile'));
Route::post('updateprofile/{id}',array('as' => 'updateprofile', 'uses'=>'UsersController@doUpdateprofile'));

Route::get('password/{id?}',array('as'=>'users.updatepassword','uses'=>'UsersController@getupdatepassword'));
Route::post('password/{id?}',array('as'=>'users.updatepassword','uses'=>'UsersController@storenewpassword'));


// Login routes
Route::get('login', 'UsersController@login');
Route::get('register', 'UsersController@register');
Route::post('login', 'UsersController@doLogin');
Route::post('register', 'UsersController@doRegister');
Route::get('logout', 'UsersController@logout');
Route::resource('distances', 'DistancesController');


//rest api routes

Route::group(['prefix' => 'api'], function () {
    Route::post('login','UsersController@doRestLogin');
    Route::post('register','UsersController@doRestRegister');
    
    Route::post('updateprofilelogged/{id}','UsersController@doRestUpdateProfileLogged');
    Route::post('updateprofile/{id}','UsersController@doRestUpdateProfile');
    Route::get('updateprofile/{id}','UsersController@getUpdateProfileRest');

    Route::get('getalldevices/{id}','DevicesController@getAllDevicesRest');
    Route::post('addnewdevice/{id}','DevicesController@addNewDeviceRest');
    Route::get('deleteDevice/{id}','DevicesController@deleteDeviceRest');

    Route::get('emailgraph/{id}','HeartratesController@emailGraph');
    Route::post('emailgraph','HeartratesController@emailGraphToEmailAddress');
    
    Route::get('graph/{id}','HeartratesController@viewGraph');
    Route::get('graphall/{id}','HeartratesController@viewGraphAll');
    Route::get('historicaldatadoctor/{id}','HeartratesController@historicaldataDoctor');
    Route::get('historicaldataalldoctor/{id}','HeartratesController@historicaldataAllDoctor');

    Route::get('historicalgraphdataall/{id}/{startdate}/{enddate}','HeartratesController@historyGraphDataAll');
    Route::get('historicalgraphdata/{id}/{startdate}/{enddate}','HeartratesController@historyGraphData');

    Route::get('getallemergency/{id}','EmergenciesController@getallemergencyRest');
    
});