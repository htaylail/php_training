<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

Route::get('/', 'Student\StudentController@showStudentList');
Route::get('/students', 'Student\StudentController@showStudentCreate')->name('student.create');
Route::post('/students', 'Student\StudentController@storeStudent')->name('student.store');
Route::get('/students/{student}', 'Student\StudentController@showStudentEdit')->name('student.edit');
Route::post('/students/{student}', 'Student\StudentController@updateStudent')->name('student.update');
Route::delete('/students/{student}', 'Student\StudentController@deleteStudentById')->name('student.destroy');
Route::post('/', 'Student\StudentController@showStudentList')->name('student.index');


Route::get('/importfile', 'Student\StudentController@importExportView')->name('students.import');
Route::get('/export', 'Student\StudentController@exportStudent')->name('student.export');
Route::post('/import', 'Student\StudentController@importStudent')->name('student.import');

Route::get('/search', 'Student\StudentController@searchStudent')->name('student.search');