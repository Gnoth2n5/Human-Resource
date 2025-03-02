<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;


use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\JobsController;
use App\Http\Controllers\Backend\MyAccountController;
use App\Http\Controllers\SalaryTransactionController;
use App\Models\Salary;

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
    Route::get('admin', function () {
        return redirect('admin/dashboard');
    });

    include 'employee/employee.php';

    include 'job/job.php';

    include 'department/department.php';

    include 'payroll/payroll.php';
 

    Route::get('admin/my_account', [MyAccountController::class, 'my_account']);
    Route::post('admin/my_account/update', [MyAccountController::class, 'edit_update']);
    // my Account end

  
});

Route::group(['middleware' => 'employee'], function () {
    Route::get('employee/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('employee/my_jobs', [JobsController::class, 'index']);
    Route::get('employee/my_salary', [SalaryTransactionController::class, 'index']);
    
    Route::get('employee/my_jobs/view/{id}', [JobsController::class, 'view_job']);

    Route::post('employee/my_jobs/complete/{id}', [JobsController::class, 'complete_job']);
    // Route::post('employee/my_jobs/complete/{id}', fn() => 'helô');




    Route::get('employee/my_account', [MyAccountController::class, 'my_account']);
    Route::post('employee/my_account/update', [MyAccountController::class, 'edit_update']);
});

Route::get('logout', [AuthController::class, 'logout']);



