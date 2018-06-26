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


// API: Create data from database
// Version: 2.0.0
// Database: GTIN
Route::middleware('auth:api')->get('/v2/codes/{codeId}', array(
    'uses' => 'CodeController@getDataFromCode2',
    'as'   => 'getDataFromCode2',
));