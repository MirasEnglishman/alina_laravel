<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Маршрут для получения текущего пользователя
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Главная страница
Route::get('/', function () {
    return view('welcome');
});

// Маршруты для продуктов (ProductController)
Route::get('/products', [ProductController::class, 'index']); // Получить все продукты
Route::get('/products/{id}', [ProductController::class, 'show']); // Получить продукт по ID
Route::post('/products', [ProductController::class, 'store']); // Создать продукт
Route::put('/products/{id}', [ProductController::class, 'update']); // Обновить продукт
Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Удалить продукт

// Маршруты для клиентов (ClientController)
Route::get('/clients', [ClientController::class, 'index']); // Получить всех клиентов
Route::get('/clients/{id}', [ClientController::class, 'show']); // Получить клиента по ID
Route::post('/clients', [ClientController::class, 'store']); // Создать клиента
Route::put('/clients/{id}', [ClientController::class, 'update']); // Обновить клиента
Route::delete('/clients/{id}', [ClientController::class, 'destroy']); // Удалить клиента

// Маршруты для заказов (OrderController)
Route::get('/orders', [OrderController::class, 'index']); // Получить все заказы
Route::get('/orders/{id}', [OrderController::class, 'show']); // Получить заказ по ID
Route::post('/orders', [OrderController::class, 'store']); // Создать заказ
Route::put('/orders/{id}', [OrderController::class, 'update']); // Обновить заказ
Route::delete('/orders/{id}', [OrderController::class, 'destroy']); // Удалить заказ

// Маршруты для категорий (CategoryController)
Route::get('/categories', [CategoryController::class, 'index']); // Получить все категории
Route::get('/categories/{id}', [CategoryController::class, 'show']); // Получить категорию по ID
Route::post('/categories', [CategoryController::class, 'store']); // Создать категорию
Route::put('/categories/{id}', [CategoryController::class, 'update']); // Обновить категорию
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // Удалить категорию
