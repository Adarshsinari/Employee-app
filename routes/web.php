<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/employee', 'App\Http\Controllers\EmployeeController@index')->name('Employee.index');
Route::get('/employee/create', 'App\Http\Controllers\EmployeeController@create')->name('Employee.create');
Route::get('/employee/{employee}/delete', 'App\Http\Controllers\EmployeeController@destroy')->name('Employee.delete');
Route::get('/employee/{employee}/edit', 'App\Http\Controllers\EmployeeController@edit')->name('Employee.edit');
Route::post('/employee/store', 'App\Http\Controllers\EmployeeController@store')->name('Employee.store');
Route::put('/employee/{employee}/update','App\Http\Controllers\EmployeeController@update')->name('Employee.update');