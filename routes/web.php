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
    return view('pages.index');
});

Auth::routes();

Route::resource('device', 'DeviceController');
Route::resource('alarm', 'AlarmController');
Route::resource('event', 'EventController');

Route::get('test-sqs', 'EventController@testProcessSqs')->name('test-sqs');

