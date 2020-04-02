<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();

});

Route::group(['middleware' => 'auth:api'], function(){
Route::get('events', 'Event\EventController@event');
Route::get('events/{parameter}', 'Event\EventController@eventFilter');
Route::get('events/{parameter}/{sort}', 'Event\EventController@eventFilter');
Route::get('event/{id}', 'Event\EventController@eventById');
Route::post('event', 'Event\EventController@eventSave');
Route::put('event/{id}', 'Event\EventController@eventUpdate');
Route::delete('event/{id}', 'Event\EventController@eventDelete');
});


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

