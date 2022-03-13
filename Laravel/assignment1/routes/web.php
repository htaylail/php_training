<?php

use App\Http\Controllers\Ajax\StudentAjaxController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Api\AjaxStudentController;
use App\Http\Controllers\Api\StudentApiController;
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


Route::get('ajax/students',[StudentAjaxController::class,'index']);
Route::post('ajax/students/add-update', [StudentAjaxController::class, 'store']);
Route::post('ajax/students/edit', [StudentAjaxController::class, 'edit']);
Route::delete('ajax/students/{id}', [StudentAjaxController::class, 'destroy']);
