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
    return view('welcome');
});

Route::group(['middleware' => 'access.control.list'], function() {

    Route::resource('threads', 'ThreadController');
});



Route::post('/replies/store', 'ReplyController@store')->name('replies.store');

Auth::routes();

Route::group(['middleware' => ['auth'/*, 'access.control.list'*/], 'namespace' => 'Manager', 'prefix' => 'manager'], function(){
	Route::get('/', function(){
		return redirect()->route('users.index');
	});

	Route::resource('roles', 'RoleController');
	Route::get('roles/{role}/resources', 'RoleController@syncResources')->name('roles.resources');
	Route::put('roles/{role}/resources', 'RoleController@updateSyncResources')->name('roles.resources.update');

	Route::resource('users', 'UserController');
	Route::resource('resources', 'ResourceController');
});





///-----------------------------------------------------------------------
// vizualização das rotas -- teste //// http://127.0.0.1:8000/routes
// Route::get('routes', function (){
//     // dd(Route::getRoutes());
//     // dd(Route::getRoutes()->getRoutes());

//     foreach(Route::getRoutes()->getRoutes() as $route) {
//         print $route->getName() . '<hr>';
//     }
// });
///-----------------------------------------------------------------------
