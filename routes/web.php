<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\Backend\JobsController;
use App\Http\Controllers\Backend\JobHistoryController;
>>>>>>> Stashed changes



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[AuthController::class,'index']);
Route::get('forgot-password',[AuthController::class,'forgot_password']);
Route::get('register',[AuthController::class,'register']);
Route::post('register_post',[AuthController::class,'register_post']);


Route::post('checkemail',[AuthController::class,'CheckEmail']);

Route::post('login_post',[AuthController::class,'login_post']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/employees',[EmployeesController::class, 'index']);
    Route::get('admin/employees/add',[EmployeesController::class, 'add']);
    Route::post('admin/employees/add',[EmployeesController::class, 'add_post']);
    Route::get('admin/employees/view/{id}',[EmployeesController::class, 'view']);
    Route::get('admin/employees/edit/{id}',[EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}',[EmployeesController::class, 'edit_update']);
    Route::get('admin/employees/delete/{id}',[EmployeesController::class, 'delete']);


<<<<<<< Updated upstream

=======
    Route::get('admin/jobs_export', [JobsController::class, 'jobs_export']);



    // job History
    Route::get('admin/job_history', [JobHistoryController::class, 'index']);
    Route::get('admin/job_history/add', [JobHistoryController::class, 'add']);

    Route::post('admin/job_history/add', [JobHistoryController::class, 'add_post']);
    Route::get('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit']);
    Route::post('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit_update']);
    Route::get('admin/job_history/delete/{id}', [JobHistoryController::class, 'delete']);
    Route::get('admin/job_history/export', [JobHistoryController::class, 'job_history_export']);
    
    
>>>>>>> Stashed changes
  
});

Route::get('logout', [AuthController::class, 'logout']);