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

/*Hostel*/
Route::resource('createhostel','HostelController');
/*Room*/
Route::resource('createroom','RoomController');
/*People*/
Route::resource('createpeople','PeopleController');


Route::get('findroom', 'PeopleController@findRoom');
/*--------------------------------------------------*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hostelview', function (){
    return view('hostelview.hostel');
});


/*==========================================================*/
Route::get('api/dropdown', function(){
    $input = \App\Hostel::get('option');
    $rooms = \App\Hostel::find($input)->rooms;
    return $rooms->lists(['id','capacity']);
});
/*----------------------------------------------------------*/

Route::get('res', function () {
    return response('Hello World', 200)
        ->header('Content-Type', 'text/plain');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('super','super');

Route::get('test', function (){
   return view('test');
});

Route::get('master', function (){
    return view('hostelview.master.master');
});

Route::get('nav', function (){
    return view('hostelview.master.navbar');
});
