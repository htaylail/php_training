<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::get('/', 'TaskController@index');
Route::post('/', 'TaskController@index')->name('task.index');
Route::post('/task', 'TaskController@store')->name('task.store');
Route::delete('/task/{id}', 'TaskController@delete')->name('task.delete');

