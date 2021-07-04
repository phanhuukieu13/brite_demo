<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::group(['prefix' => 'users', 'as' => 'users.'], function() {

        Route::get('/','UserController@index')->name('index');

        Route::get('/create','UserController@create')->name('create');

        Route::post('/store', 'UserController@store')->name('store');
        
        Route::post('/uploadFile', 'UserController@uploadFile')->name('uploadFile');
        Route::get('/edit','UserController@edit')->name('show-edit');
        Route::get('/edit/show/{id}','UserController@showEidt')->name('edit');
        Route::post('/update/{id}', 'UserController@update')->name('update');

        // Route::post('update/{id}', 'UserController@update')->name('update');
        Route::get('/search-name','UserController@searchName')->name('search-name');
        Route::get('/search-email','UserController@searchEmail')->name('search-email');

        Route::post('destroy/{id}', 'UserController@destroy')->name('destroy');
        Route::get('/detail-user{id}','UserController@viewDetail')->name('detail-user');


    });

});