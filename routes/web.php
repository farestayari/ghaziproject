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
Route::get('/vm-dashboard', 'MachineController@index')->name('dashboard');
Route::get('/vm-create', 'MachineController@create')->name('create');
Route::post ('/vm-store', 'MachineController@store')->name('store');
Route::get('/vm-store', 'MachineController@store')->name('store');
Route::get('/vm-info/{id}', 'MachineController@info')->name('info');
Route::get('/vm-edit/{id}', 'MachineController@edit')->name('edit');
Route::get('/machine-edit/{id}', 'MachineController@showEditMachineInfo')->name('showEdit');
Route::get('/vm-update/{id}', 'MachineController@updateMachine')->name('updateMachine');
Route::post('/vm-update/{id}', 'MachineController@StoreEditMachineInfo')->name('StoreEditMachineInfo');
Route::get('/vm-delete/{id}', 'MachineController@deleteMachine')->name('deleteMachine');
Route::get('/vm-log/', 'MachineController@showDeletedMachine')->name('showDeletedMachine');
Route::get('/vm-log/restore/{id}', 'MachineController@restoreMachine')->name('restoreMachine');
