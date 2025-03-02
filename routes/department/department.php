<?php

use App\Http\Controllers\Backend\DepartmentController;
use Illuminate\Support\Facades\Route;



Route::get('admin/departments', [DepartmentController::class, 'index']);
Route::get('admin/departments/add', [DepartmentController::class, 'add']);
Route::post('admin/departments/add', [DepartmentController::class, 'add_post']);
Route::get('admin/departments/edit/{id}', [DepartmentController::class, 'edit']);
Route::post('admin/departments/edit/{id}', [DepartmentController::class, 'edit_update']);
Route::get('admin/departments/view/{id}', [DepartmentController::class, 'view']);
Route::get('admin/departments/delete/{id}', [DepartmentController::class, 'delete']);
Route::get('admin/departments/add_employee/{id}', [DepartmentController::class, 'add_employee']);
Route::post('admin/departments/add_employee/{id}', [DepartmentController::class, 'add_employee_post']);
Route::get('admin/departments/delete_employee/{id}', [DepartmentController::class, 'delete_employee']);
