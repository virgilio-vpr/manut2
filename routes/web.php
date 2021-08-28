<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){

    // ===================================  Routes Directions ===============================================
    Route::get('companies/{url_company}/directions/create', 'DirectionController@create')->name('directions.company.create');
    Route::put('companies/{url_company}/directions/{companyId}/{idDirection}', 'DirectionController@update')->name('directions.company.update');
    Route::get('companies/{url_company}/directions/{idDirection}/edit', 'DirectionController@edit')->name('directions.company.edit');
    Route::any('companies/{url_company}/search', 'DirectionController@search')->name('directions.company.search');
    Route::delete('companies/{url_company}/directions/{idDirection}', 'DirectionController@destroy')->name('directions.company.destroy');
    Route::get('companies/{url_company}/directions/{idDirection}', 'DirectionController@show')->name('directions.company.show');
    Route::post('companies/{url_company}/directions/{companyId}', 'DirectionController@store')->name('directions.company.store');
    Route::get('companies/directions', 'DirectionController@choose')->name('directions.company.choose');
    Route::get('companies/{url_company}/directions', 'DirectionController@index')->name('directions.company.index');

    // ===================================  Routes Companies ================================================
    Route::get('companies/create', 'CompanyController@create')->name('companies.create');
    Route::put('companies/{url_company}', 'CompanyController@update')->name('companies.update');
    Route::get('companies/{url_company}/edit', 'CompanyController@edit')->name('companies.edit');
    Route::any('companies/search', 'CompanyController@search')->name('companies.search');
    Route::delete('companies/{url_company}', 'CompanyController@destroy')->name('companies.destroy');
    Route::get('companies/{url_company}', 'CompanyController@show')->name('companies.show');
    Route::post('companies', 'CompanyController@store')->name('companies.store');
    Route::get('companies', 'CompanyController@index')->name('companies.index');

    Route::get('/', 'HomeController@home')->name('admin.home');

});




Route::get('/', function () {
    return view('welcome');
});
