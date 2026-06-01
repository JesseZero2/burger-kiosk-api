<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuItemController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Middleware\ApiKeyMiddleware;

// ─────────────────────────────────────────────
// ORDERS  (Jesse)
// ─────────────────────────────────────────────
Route::get('/orders',                  [OrderController::class, 'index']);
Route::post('/orders',                 [OrderController::class, 'store']);
Route::get('/orders/{order}',          [OrderController::class, 'show']);
Route::put('/orders/{order}/status',   [OrderController::class, 'updateStatus']);

// ─────────────────────────────────────────────
// CART  (Marielle)
// ─────────────────────────────────────────────
Route::get('/cart/{session_id}',                        [CartController::class, 'show']);
Route::post('/cart/{session_id}/items',                 [CartController::class, 'addItem']);
Route::delete('/cart/{session_id}/items/{item_id}',     [CartController::class, 'removeItem']);
Route::delete('/cart/{session_id}',                     [CartController::class, 'clear']);
Route::post('/cart/{session_id}/checkout',              [CartController::class, 'checkout']);

// ─────────────────────────────────────────────
// PAYMENTS  (Nick)
// ─────────────────────────────────────────────
Route::get('/payments',                    [PaymentController::class, 'index']);
Route::post('/payments',                   [PaymentController::class, 'store']);
Route::get('/payments/{payment_id}',       [PaymentController::class, 'show']);
Route::get('/payments/order/{order_id}',   [PaymentController::class, 'byOrder']);
Route::post('/payments/{payment_id}/void', [PaymentController::class, 'void']);

// ─────────────────────────────────────────────
// MENU ITEMS  (Jericho) — protected by API key
// ─────────────────────────────────────────────
Route::middleware(ApiKeyMiddleware::class)->group(function () {
    Route::get('/menu-items',       [MenuItemController::class, 'index']);
    Route::post('/menu-items',      [MenuItemController::class, 'store']);
    Route::put('/menu-items/{id}',  [MenuItemController::class, 'update']);

    Route::get('/menu-items', [MenuItemController::class, 'index']);
    Route::get('/menu-items/{id}', [MenuItemController::class, 'show']);

    Route::post('/menu-items', [MenuItemController::class, 'store']);
    Route::put('/menu-items/{id}', [MenuItemController::class, 'update']);
    Route::delete('/menu-items/{id}', [MenuItemController::class, 'destroy']);
});