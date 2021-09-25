<?php

use App\Http\Livewire\FormChoose;
use Illuminate\Support\Facades\Route;


// ===================================  Routes Livewire ===============================================
Route::get('choose/{type_menu}', FormChoose::class)->name('choose.menu');
Route::get('equipment/{type_menu}', FormChoose::class)->name('equipment.index');


Route::prefix('admin')
        ->namespace('App\\Http\\Controllers\\Admin')
        ->group(function(){

     // ===================================  Routes Departments ===============================================
     Route::get('managements/{url_management}/departments/create', 'DepartmentController@create')->name('departments.management.create');
     Route::put('managements/{url_management}/departments/{managementId}/{iddepartment}', 'DepartmentController@update')->name('departments.management.update');
     Route::get('managements/{url_management}/departments/{idmanagement}/edit', 'DepartmentController@edit')->name('departments.management.edit');
     Route::any('managements/{url_management}/search', 'DepartmentController@search')->name('departments.management.search');
     Route::delete('managements/{url_management}/departments/{idmanagement}', 'DepartmentController@destroy')->name('departments.management.destroy');
     Route::get('managements/{url_management}/departments/{idmanagement}', 'DepartmentController@show')->name('departments.management.show');
     Route::post('managements/{url_management}/departments/{managementId}', 'DepartmentController@store')->name('departments.management.store');
     Route::get('managements/{url_management}/management/{url_department?}', 'DepartmentController@index')->name('departments.management.index');

    // ===================================  Routes Managements ===============================================
    Route::get('directions/{url_direction}/managements/create', 'ManagementController@create')->name('managements.direction.create');
    Route::put('directions/{url_direction}/managements/{directionId}/{idManagement}', 'ManagementController@update')->name('managements.direction.update');
    Route::get('directions/{url_direction}/managements/{idDirection}/edit', 'ManagementController@edit')->name('managements.direction.edit');
    Route::any('directions/{url_direction}/search', 'ManagementController@search')->name('managements.direction.search');
    Route::delete('directions/{url_direction}/managements/{idDirection}', 'ManagementController@destroy')->name('managements.direction.destroy');
    Route::get('directions/{url_direction}/managements/{idDirection}', 'ManagementController@show')->name('managements.direction.show');
    Route::post('directions/{url_direction}/managements/{directionId}', 'ManagementController@store')->name('managements.direction.store');
    Route::get('directions/{url_direction}/direction/{url_management?}', 'ManagementController@index')->name('managements.direction.index');

    // ===================================  Routes Directions ===============================================
    Route::get('companies/{url_company}/directions/create', 'DirectionController@create')->name('directions.company.create');
    Route::put('companies/{url_company}/directions/{companyId}/{idDirection}', 'DirectionController@update')->name('directions.company.update');
    Route::get('companies/{url_company}/directions/{idDirection}/edit', 'DirectionController@edit')->name('directions.company.edit');
    Route::any('companies/{url_company}/search', 'DirectionController@search')->name('directions.company.search');
    Route::delete('companies/{url_company}/directions/{idDirection}', 'DirectionController@destroy')->name('directions.company.destroy');
    Route::get('companies/{url_company}/directions/{idDirection}', 'DirectionController@show')->name('directions.company.show');
    Route::post('companies/{url_company}/directions/{companyId}', 'DirectionController@store')->name('directions.company.store');
    Route::post('company/direction', 'DirectionController@selectDirection')->name('directions.company.select');
    Route::get('companies/{url_company}/direction/{url_direction?}', 'DirectionController@index')->name('directions.company.index');

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
