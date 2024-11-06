<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Метод для получения всех продуктов
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Метод для сохранения нового продукта
    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'published' => 'required|boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ]);

        // Сохранение записи
        Product::create($validated);

        return response()->json(['message' => 'Продукт успешно добавлен!'], 200);
    }

    // Метод для обновления существующего продукта
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'published' => 'required|boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ]);

        // Обновление записи
        $product->update($validated);

        return response()->json(['message' => 'Продукт успешно обновлен!'], 200);
    }

    // Метод для удаления продукта
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Продукт успешно удален!'], 200);
    }
}
