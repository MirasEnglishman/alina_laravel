<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product', 'client'])->get();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date',
        ]);

        $order = Order::create($validatedData);

        return response()->json(['message' => 'Заказ успешно создан', 'order' => $order], 201);
    }


    public function show($id)
    {
        $order = Order::with(['product', 'client'])->findOrFail($id);
        return response()->json($order);
    }


    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date',
        ]);

        $order->update($validatedData);

        return response()->json(['message' => 'Заказ успешно обновлен', 'order' => $order]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Заказ успешно удален']);
    }
}
