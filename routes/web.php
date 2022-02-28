<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('threads.index');
});

Route::group(['middleware' => 'access.control.list'], function() {

    // Route::put('/updateteste/{threads}', 'ThreadController@updateTeste')->name('update.topico');

	Route::resource('threads', 'ThreadController');

});

Route::post('/replies/store', 'ReplyController@store')->name('replies.store');


Auth::routes();


Route::group(['middleware' => ['auth', 'access.control.list'], 'namespace' => 'Manager', 'prefix' => 'manager'], function(){
	Route::get('/', function(){
		return redirect()->route('users.index');
	});

    Route::delete('/rolesdestroy/{id}', 'RoleController@destroyConnected')->name('destroy.connected'); // rota adaptada

	Route::resource('roles', 'RoleController');
	Route::get('roles/{role}/resources', 'RoleController@syncResources')->name('roles.resources');
	Route::put('roles/{role}/resources', 'RoleController@updateSyncResources')->name('roles.resources.update');



    Route::get('/{id}/permissions', 'UserController@associatedPermissions')->name('associated.permissions'); // rota adapatda

	Route::resource('users', 'UserController');
	Route::resource('resources', 'ResourceController');
	Route::resource('modules', 'ModuleController');
	Route::get('modules/{module}/resources', 'ModuleController@syncResources')->name('modules.resources');
	Route::put('modules/{module}/resources', 'ModuleController@updateSyncResources')->name('modules.resources.update');

});


Route::get('routes', function(){
	foreach(Route::getRoutes()->getRoutes() as $route) {
		print $route->getName() . '<hr>';
	}
});

// http://127.0.0.1:8000/routes
