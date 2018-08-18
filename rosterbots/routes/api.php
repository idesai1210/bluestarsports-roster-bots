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
Route::get('teams/{id}/players', 'TeamsController@getAllPlayers');
Route::get('teams/{id}', 'TeamsController@createRandom');
Route::post('teams', 'TeamsController@create');
Route::put('teams/{id}', 'TeamsController@update');
Route::delete('teams/{id}', 'TeamsController@delete');


// Player Routes
Route::get('players/{name}', 'PlayersController@get');
Route::post('players', 'PlayersController@create');
Route::put('players/{id}', 'PlayersController@update');
Route::delete('players/{id}', 'PlayersController@delete');

