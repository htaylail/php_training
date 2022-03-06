<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

Route::get('/', 'Student\StudentController@showStudentList');
Route::get('/students', 'Student\StudentController@showStudentCreate')->name('student.create');
Route::post('/students', 'Student\StudentController@storeStudent')->name('student.store');
Route::get('/students/{student}', 'Student\StudentController@showStudentEdit')->name('student.edit');
Route::post('/students/{student}', 'Student\StudentController@updateStudent')->name('student.update');
Route::delete('/students/{student}', 'Student\StudentController@deletePostById')->name('student.destroy');
Route::post('/', 'Student\StudentController@showStudentList')->name('student.index');