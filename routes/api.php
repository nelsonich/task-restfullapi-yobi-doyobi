<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::controller(OrderController::class)->prefix('orders')->group(function () {
    Route::get('/all', 'get');
    Route::get('/get-by-id/{id}', 'getById');
    Route::post('/create', 'create');
    Route::put('{id}/edit', 'edit');
    Route::delete('{id}/delete', 'remove');
});
