<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OfficeExpenseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PaymentController;

// STAFF
Route::get('/staff', [StaffController::class, 'index']);
Route::post('/staff', [StaffController::class, 'store']);

// EXPENSES
Route::get('/expenses', [OfficeExpenseController::class, 'index']);
Route::post('/expenses', [OfficeExpenseController::class, 'store']);

// PROJECTS
Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/projects/{id}/cost', [ProjectController::class, 'getCost']);

// PAYMENTS
Route::post('/payments', [PaymentController::class, 'store']);
Route::post('/pay', [PaymentController::class, 'pay']);
