<?php

use App\Http\Controllers\Api\V1\CompetitionController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/competitions', [CompetitionController::class, 'store']);
    Route::get('/competitions/{id}', [CompetitionController::class, 'show']);
    Route::put('/competitions/{id}', [CompetitionController::class, 'update']);
    Route::delete('/competition/{id}', [CompetitionController::class, 'destroy']);
});


