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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/employee_add', 'HomeController@add');

Route::get('/employee_show', 'HomeController@employee_list');
Route::get('/employee_edit/{id}', 'HomeController@employee_edit');

Route::post('/employee_update/{id}', 'HomeController@update');

Route::get('/employee_delete/{id}', 'HomeController@delete');


//department

Route::get('/d_index', 'HomeController@d_index');

Route::post('/department_add', 'HomeController@department_add');

Route::get('/department_show', 'HomeController@department_show');




//project 

Route::get('/project_show', 'ProjectController@project_show');
Route::get('/project_index', 'ProjectController@index');
Route::post('/project_add', 'ProjectController@add');

Route::get('/project_delete/{id}', 'ProjectController@delete');

//superviser

Route::post('/superviser_add', 'HomeController@superviser_add');
Route::get('/supervisor_show', 'HomeController@supervisor_show');






