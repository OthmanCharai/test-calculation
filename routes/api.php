<?php

use App\Http\Controllers\OperationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('operation')->group(function () {

    // Addition Route
    Route::post('plus', [OperationController::class, 'plusOperation'])
        ->name('operation.plus');

    // Minus Route
    Route::post('minus', [OperationController::class, 'minusOperation'])
        ->name('operation.minus');

    // Multiplication Route
    Route::post('multiplication', [OperationController::class, 'multiplicationOperation'])
        ->name('operation.multiplication');

    // Division Route
    Route::post('division', [OperationController::class, 'divisionOperation'])
        ->name('operation.division');

});
