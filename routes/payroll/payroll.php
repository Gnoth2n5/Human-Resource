<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PayrollController;
use App\Http\Controllers\SalaryTransactionController;

Route::get('admin/payroll', [PayrollController::class, 'index']);
Route::get('admin/payroll/add', [PayrollController::class, 'add']);
Route::post('admin/payroll/add', [PayrollController::class, 'add_post']);
// Route::get('admin/payroll/view/{id}', [PayrollController::class, 'view']);
Route::get('admin/payroll/edit/{id}', [PayrollController::class, 'edit']);
Route::post('admin/payroll/edit/{id}', [PayrollController::class, 'update']);
Route::get('admin/payroll/delete/{id}', [PayrollController::class, 'delete']);
// Route::get('admin/payroll/export', [PayrollController::class, 'payroll_export']);

Route::get('admin/payroll/caculate/{id}', [PayrollController::class, 'caculate']);
// Route::post('admin/payroll/caculate', [PayrollController::class, 'caculate_post']);
Route::get('admin/history-salary', [SalaryTransactionController::class, 'index']);
Route::get('admin/history-salary/delete/{id}', [SalaryTransactionController::class, 'delete']);