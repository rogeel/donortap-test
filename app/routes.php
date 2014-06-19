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
	return Redirect::to('users/login');
});

Route::controller('users', 'UsersController');

Route::controller('dashboard', 'DashBoardController');

Route::controller('admin', 'AdminController');

Route::get('users/logout', array(
    'as'   => 'users/logout', // This is the route's name
    'uses' => 'UsersController@getLogut'
));

Route::get('dashboard/leads', array(
    'as'   => 'dashboard/leads', // This is the route's name
    'uses' => 'DashboardController@getLeads'
));

Route::get('dashboard/pledges', array(
    'as'   => 'dashboard/pledges', // This is the route's name
    'uses' => 'DashboardController@getPledges'
));

Route::get('dashboard/donormatch', array(
    'as'   => 'dashboard/donormatch', // This is the route's name
    'uses' => 'DashboardController@getDonormatch'
));

Route::get('dashboard/donor', array(
    'as'   => 'dashboard/donor', // This is the route's name
    'uses' => 'DashboardController@getDonor'
));

Route::get('dashboard/contributionsbydonor', array(
    'as'   => 'dashboard/contributionsbydonor', // This is the route's name
    'uses' => 'DashboardController@getContributionsbydonor'
));

Route::get('admin/donors', array(
    'as'   => 'admin/donors', // This is the route's name
    'uses' => 'AdminController@getDonors'
));

Route::get('admin/dashboard', array(
    'as'   => 'admin/dashboard', // This is the route's name
    'uses' => 'AdminController@getDashboard'
));


Route::get('admin/newdonor', array(
    'as'   => 'admin/newdonor', // This is the route's name
    'uses' => 'AdminController@getNewdonor'
));


Route::get('admin/createdonor', array(
    'as'   => 'admin/createdonor', // This is the route's name
    'uses' => 'AdminController@getCreatedonor'
));

