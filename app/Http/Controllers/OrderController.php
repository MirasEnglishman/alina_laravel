<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Получить список всех заказов с привязанными продуктами и клиентами
    public function index()
    {
        $orders = Order::with(['product', 'client'])->get();
        return response()->json($orders);
    }

    // Получить один заказ по ID с привязанными продуктами и клиентами
    public function show($id)
    {
        $order = Order::with(['product', 'client'])->find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        return response()->json($order);
    }

    // Создать новый заказ
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $order = Order::create($validatedData);

        return response()->json($order, 201);
    }

    // Обновить существующий заказ
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            // Добавьте другие поля валидации, если нужно
        ]);

        $order->update($validatedData);

        return response()->json($order);
    }

    // Удалить заказ
    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
