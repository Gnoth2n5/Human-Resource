<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\EmployeesController;


Route::controller(EmployeesController::class)->group(function () {
    Route::get('admin/employees', 'index');
    Route::get('admin/employees/add', 'add');
    Route::post('admin/employees/add', 'add_post');
    Route::get('admin/employees/view/{id}', 'view');
    Route::get('admin/employees/edit/{id}', 'edit');
    Route::post('admin/employees/edit/{id}', 'edit_update');
    Route::get('admin/employees/delete/{id}', 'delete');
});




