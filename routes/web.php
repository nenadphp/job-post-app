<?php

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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

/** Job post route  */
Route::get('/job/{id}');
Route::get('/jobs', 'JobController@index');
Route::group(['middleware' => 'auth'], function (){
    Route::get('/job-add', 'JobController@jobAdd');
    Route::post('/job-store','JobController@store');
    Route::put('/job/{id}', 'JobController@update');
    Route::delete('/job/{id}', 'JobController@destroy');
});

Route::get('/publish', 'JobController@markAsPublic')->middleware('authorized');
Route::get('/spam', 'JobController@markAsSpam')->middleware('authorized');


