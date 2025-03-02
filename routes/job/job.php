<?php
use App\Http\Controllers\Backend\JobsController;
use Illuminate\Support\Facades\Route;


Route::get('admin/jobs', [JobsController::class, 'index']);
Route::get('admin/jobs/add', [JobsController::class, 'add']);
Route::post('admin/jobs/add', [JobsController::class, 'add_post']);
Route::get('admin/jobs/view/{id}', [JobsController::class, 'view']);
Route::get('admin/jobs/edit/{id}', [JobsController::class, 'edit']);
Route::post('admin/jobs/update/{id}', [JobsController::class, 'edit_update']);
Route::get('admin/jobs/delete/{id}', [JobsController::class, 'delete']);

Route::get('admin/jobs_export', [JobsController::class, 'jobs_export']);