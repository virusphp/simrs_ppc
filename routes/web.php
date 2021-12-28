<?php

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
    return redirect(route('home'));
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/admin/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/admin/login', 'LoginController@login');
    Route::post('/admin/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => ['auth'], 'namespace' => 'Backend', 'prefix' => 'backend'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    // USER MANAG
    Route::resource('users', 'UsersController');
    Route::get('ajax/users', 'UsersController@indexAjax')->name('ajax.users');
    Route::post('users/ajax/store', 'UsersController@ajaxStore')->name('ajax.users.store');
    Route::PATCH('users/ajax/update', 'UsersController@ajaxUpdate')->name('ajax.users.update');
    Route::delete('users/ajax/destroy', 'UsersController@ajaxDestroy')->name('ajax.users.destroy');

    // ROLE MANAG
    Route::Resource('roles', 'RolesController');
});