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

#Add Student
Route::get('/', 'StudentController@index');
Route::post('/student', 'StudentController@store');

#All Students - Admin
Route::get('/all', 'StudentController@all');

#Edit Student
Route::get('/student/{id}/edit', 'StudentController@edit');
Route::put('/student/{id}', 'StudentController@update');

#View Student
Route::get('/student/{id}', 'StudentController@show');

#Delete Student
Route::get('/student/{id}/delete', 'StudentController@delete');
Route::delete('/student/{id}', 'StudentController@destroy');

#Create Course
Route::get('/course/create', 'CourseController@create');
Route::post('/course', 'CourseController@save');

Route::get('/env', function () {
  dump(config('app.name'));
  dump(config('app.env'));
  dump(config('app.debug'));
  dump(config('app.url'));
});
