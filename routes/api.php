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

/***************************************************************************************/
/*Hostel*/

Route::apiResource('hostels',  'api\HostelController');

/*=====================================================================================*/
/*Room*/
Route::apiResource('rooms',    'api\RoomController')
            ->except(['store','update','destroy']);
/*=====================================================================================*/
/*People*/
Route::apiResource('peoples',  'api\PeopleController')
           ->except(['store','update','destroy']);
/***************************************************************************************/
