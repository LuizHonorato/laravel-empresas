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

Route::get('/', 'CompanieController@index');

Auth::routes();

Route::resource('companies', 'CompanieController');
Route::get('/search-companie', 'CompanieController@search');

Route::resource('employees', 'EmployeeController');
Route::get('/search-employee', 'EmployeeController@search');