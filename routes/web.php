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
    return redirect('dashboard');
});


Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);


/*
|--------------------------------------------------------------------------
| People Routes
|--------------------------------------------------------------------------
 */
Route::name('people.')->prefix('people')->group(function () {
    Route::get('/')->name('index')->uses('PeopleController@index');
    Route::get('create')->name('create')->uses('PeopleController@create');
    Route::get('{id}')->name('edit')->uses('PeopleController@edit');
    Route::get('{id}/change-status')->name('change-status')->uses('PeopleController@changeStatus');
    Route::post('create')->name('store')->uses('PeopleController@store');
    Route::put('{id}')->name('update')->uses('PeopleController@update');
    // Route::get('{id}')->name('delete')->uses('PeopleController@destroy');
    Route::post('delete-many')->name('delete-many')->uses('PeopleController@destroyMany');


    /*
    |--------------------------------------------------------------------------
    | Dependents
    |--------------------------------------------------------------------------
     */
    Route::name('dependents.')->prefix('{peopleID?}/dependents')->group(function () {
	    Route::get('/')->name('index')->uses('DependentController@index');
	    Route::get('create')->name('create')->uses('DependentController@create');
	    Route::post('create')->name('store')->uses('DependentController@store');
    	Route::get('{id}')->name('delete')->uses('DependentController@destroy');
    });
});