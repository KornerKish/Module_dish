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

Route::get('/', 'ModuleDishController@index', ['as' => 'user'])->name('index');
Route::post('/', 'ModuleDishController@find', ['as' => 'user'])->name('find');
Route::get('/findd', 'ModuleDishController@find', ['as' => 'user'])->name('findd');

Route::group(['prefix'     => 'admin',
              'namespace'  => 'Admin',
              'middleware' => ['auth']],
    function () {
        Route::resource('/ingredient', 'IngredientController', ['as' => 'admin']);
        Route::resource('/dish', 'DishController', ['as' => 'admin']);
        Route::get('/', 'AdminPanelController@adminPanel')->name('admin.index');
    });