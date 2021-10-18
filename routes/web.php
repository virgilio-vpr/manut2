<?php

use App\Http\Livewire\FormChoose;
use App\Http\Livewire\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ===================================  Routes Logout  =========================================================
Route::get('logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('user.logout')->middleware('auth');

// ===================================  Routes Livewire Login====================================================
Route::get('login', UserLogin::class)->name('login');

// ===================================  Routes Livewire Menu ====================================================
Route::get('choose/{type_menu}', FormChoose::class)->name('choose.menu')->middleware('auth');
Route::get('equipment/{type_menu}', FormChoose::class)->name('equipment.index')->middleware('auth');


// ===================================  Routes Laravel Controller ===============================================
Route::prefix('admin')
        ->namespace('App\\Http\\Controllers\\Admin')
        ->middleware('auth')
        ->group(function(){

    // ===================================  Routes Users x Role ===============================================
    Route::get('roles/{id?}/users/create', 'UserController@create')->name('users.role.create');
    Route::put('roles/{id}/users/{idUser}', 'UserController@update')->name('users.role.update');
    Route::get('roles/{id}/users/{idUser}/edit', 'UserController@edit')->name('users.role.edit');
    Route::any('roles/{id?}/search', 'UserController@search')->name('users.role.search');
    Route::delete('roles/{id}/users/{idUser}', 'UserController@destroy')->name('users.role.destroy');
    Route::get('roles/{id}/users/{idUser}', 'UserController@show')->name('users.role.show');
    Route::post('roles/user', 'UserController@store')->name('users.role.store');
    Route::post('role/user', 'UserController@selectuser')->name('users.role.select');
    Route::get('roles/{id}/user/{idUser?}', 'UserController@index')->name('users.role.index');
    Route::get('roles/user/all', 'UserController@usersAllList')->name('users.role.listAll');

    // ===================================  Routes Role ================================================
     Route::delete('roles/delete/{id}', 'RoleController@destroy')->name('roles.destroy');
     Route::get('roles/create', 'RoleController@create')->name('roles.create');
     Route::put('roles/{id}', 'RoleController@update')->name('roles.update');
     Route::get('roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
     Route::any('roles/search', 'RoleController@search')->name('roles.search');
     Route::post('roles', 'RoleController@store')->name('roles.store');
     Route::get('roles', 'RoleController@index')->name('roles.index');

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

    Route::get('/dashbord', 'HomeController@home')->name('admin.home');

});


Route::get('/', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return view('welcome');
});
