<?php

namespace App\Http\Controllers\Api\V1; // Certifique-se de que está no namespace correto

use App\Http\Controllers\Controller;  // Importa o controlador base
use App\Models\Temperature; // Importa o modelo de Temperature
use App\Http\Requests\StoreTemperatureRequest; // Importa o request para validação
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Temperatura;

class TemperatureController extends Controller
{
    /**
     * Exibe todas as temperaturas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Obtém todas as temperaturas do banco de dados
        $temperatures = Temperature::all();
        
        // Retorna os dados em formato JSON
        return response()->json($temperatures);
    }

    /**
     * Armazena a temperatura no banco de dados.
     *
     * @param  \App\Http\Requests\StoreTemperatureRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemperatureRequest $request)
    {
        Log::info('Temperatura recebida:', $request->all());

        // Valida os dados antes de salvar
        $validated = $request->validated();

        // Cria um novo registro de temperatura
        Temperature::create($validated);

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Temperatura salva com sucesso'], 201);
    }
}

