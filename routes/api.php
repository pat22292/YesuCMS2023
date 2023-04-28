<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers; 
use Illuminate\Support\Facades\Gate;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace'=>'App\Http\Controllers'], function(){
    
    
    Route::post('login', 'AuthController@login');
    Route::post('register', 'UserController@register');
    Route::get('suggest-list', 'TransactionController@suggestionList');
    Route::get('show-sections', 'SectionController@show');

    Route::get('new-section', 'SectionController@store');


    Route::get('show-menus', 'MenuController@show');
    Route::post('edit-menu/{id}', 'MenuController@edit');
    Route::get('suggest-list-filterered/{word}', 'TransactionController@suggestionListFiltered');

    Route::group(['prefix'=>'oauth'], function($api) {
        Route::post('token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
        Route::delete('clients/{client_id}', '\Laravel\Passport\Http\Controllers\ClientController@destroy');
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::get('users', 'UserController@show');
        Route::post('verify', 'AuthController@verify');

        //Client Routes
        Route::get('show-clients', 'ClientController@show');
        Route::post('register-client', 'ClientController@register');

        //Service Routes
        Route::get('show-services', 'ServiceController@show');
        Route::post('show-services-by-uid', 'ServiceController@getByUserID');
        Route::post('register-service', 'ServiceController@register');



        //Unit Routes
        Route::get('show-units', 'UnitController@show');
        Route::post('register-unit', 'UnitController@register');

        //Transaction Routes
        Route::get('transactions', 'TransactionController@show');
        Route::post('store-transactions', 'TransactionController@store');
        Route::post('import-transactions', 'TransactionController@import');
        Route::post('filter-date', 'TransactionController@filterDate');


        Route::get('user/{id}', 'UserController@showById');
        Route::get('user', 'UserController@showUserDetails');
        Route::get('logout', 'AuthController@logout');
     
    });
});

