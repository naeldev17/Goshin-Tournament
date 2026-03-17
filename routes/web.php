<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Competition;

Route::get('/', function () {
    return response()->json([
        'message' => 'Karate Tournament API'
    ]);
});

