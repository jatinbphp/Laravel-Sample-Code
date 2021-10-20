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

Route::get('/', 'HomeController@index')->name('home');

//agency route
Route::group(['prefix' => 'agency', 'as' => 'agency.'], function () {

    Route::get('/', [
        'as' => 'list',
        'uses' => 'AgencyController@index',
    ]);

    Route::post('get', [
        'as' => 'get',
        'uses' => 'AgencyController@getForm',
    ]);

    Route::post('save', [
        'as' => 'save',
        'uses' => 'AgencyController@save',
    ]);

    Route::post('{agencyId}/edit', [
        'as' => 'edit',
        'uses' => 'AgencyController@edit',
    ])->where('agencyId', '[0-9]+');

    Route::post('{agencyId}/update', [
        'as' => 'update',
        'uses' => 'AgencyController@update',
    ])->where('agencyId', '[0-9]+');

    Route::post('{agencyId}/delete', [
        'as' => 'delete',
        'uses' => 'AgencyController@delete',
    ])->where('agencyId', '[0-9]+');

    Route::post('{agencyId}/status', [
        'as' => 'status',
        'uses' => 'AgencyController@status',
    ])->where('agencyId', '[0-9]+');

    Route::post('/deletes', [
        'as' => 'deletes',
        'uses' => 'AgencyController@agencyDeletes',
    ]);

    Route::post('/status', [
        'as' => 'agencyStatus',
        'uses' => 'AgencyController@agencyStatus',
    ]);

    Route::post('/column', [
        'as' => 'column',
        'uses' => 'AgencyController@getColumn',
    ]);
});
