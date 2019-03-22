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





Auth::routes();
/***************************************************************************************/
/*Hostel*/
Route::resource('hostels','HostelController');
/*=====================================================================================*/
/*Room*/
Route::resource('rooms','RoomController');
/*=====================================================================================*/
/*People*/
Route::resource('peoples','PeopleController');
/***************************************************************************************/
Route::get('findRoom','PeopleController@findRoom');



















Route::get('/', function () {
    return view('welcome');
});
/*==========================================================*/
/*Route::get('/api/dropdown', function(){
    $input = \App\Hostel::get('option');
    $rooms = \App\Hostel::find($input)->rooms;
    return $rooms->lists(['id','capacity']);
});*/
Route::get('');

Auth::routes();
Auth::routes();
Auth::routes();
