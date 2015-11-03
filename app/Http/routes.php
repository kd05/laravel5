<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('productindex','ProductController@index');

Route::get('productform','ProductController@form');

Route::post('save','ProductController@save');

Route::get('DeleteProduct/{id}','ProductController@delete');

Route::get('EditProduct/{id}','ProductController@update');

Route::post('UpdateSave','ProductController@updateSave');


//Ajax students pages

Route::get('/','Student@index');

Route::post('save','Student@saverecord');

Route::post('displaydata','Student@getdata');

Route::post('editrow','Student@editdata');

