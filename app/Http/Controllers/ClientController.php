<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Получить список всех клиентов
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    // Создать нового клиента
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $client = Client::create($validatedData);

        return response()->json(['message' => 'Клиент успешно создан', 'client' => $client], 201);
    }

    // Получить информацию о конкретном клиенте
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    // Обновить информацию о клиенте
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $client->update($validatedData);

        return response()->json(['message' => 'Информация о клиенте успешно обновлена', 'client' => $client]);
    }

    // Удалить клиента
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(['message' => 'Клиент успешно удалён']);
    }
}
