<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuItemController;

Route::middleware('apikey')->group(function () {

    Route::get('/menu-items', [MenuItemController::class, 'index']);

    Route::post('/menu-items', [MenuItemController::class, 'store']);

    Route::put('/menu-items/{id}', [MenuItemController::class, 'update']);

    Route::delete('/menu-items/{id}', [MenuItemController::class, 'destroy']);

});