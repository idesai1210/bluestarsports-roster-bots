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

// Team Routes

Route::get('teams', 'TeamsController@getAll');
Route::post('teams', 'TeamsController@create');
Route::put('teams/{team}', 'TeamsController@update');
Route::delete('teams/{team}', 'TeamsController@delete');
