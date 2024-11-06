<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Маршрут для получения текущего пользователя
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return view('welcome');
});



// Маршруты для продуктов
Route::get('/products', [ProductController::class, 'index']);

// Маршруты для клиентов
Route::get('/clients', [ClientController::class, 'index']);

// Маршруты для заказов
Route::get('/orders', [OrderController::class, 'index']);

// Маршруты для категорий
Route::get('/categories', [OrderController::class, 'index']);
