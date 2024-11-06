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

}
