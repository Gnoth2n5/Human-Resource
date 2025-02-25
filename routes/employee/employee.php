<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\EmployeesController;


Route::controller(EmployeesController::class)->group(function () {
    Route::get('employees', 'index');
    Route::get('employees/add', 'add');
    Route::post('employees/add', 'add_post');
    Route::get('employees/view/{id}', 'view');
    Route::get('employees/edit/{id}', 'edit');
    Route::post('employees/edit/{id}', 'edit_update');
    Route::get('employees/delete/{id}', 'delete');
});


