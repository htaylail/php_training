<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'Api\StudentApiController@showStudentList');
Route::post('/students/store', 'Api\StudentApiController@storeStudent');
Route::get('/students/{id}', 'Api\StudentApiController@getStudentById');
Route::put('/students/edit/{id}', 'Api\StudentApiController@updateStudent');
Route::delete('/students/delete/{id}', 'Api\StudentApiController@deleteStudentById');
