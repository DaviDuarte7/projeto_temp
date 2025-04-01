<?php

namespace App\Http\Controllers;

use App\Models\Temperature; // Model para a tabela de temperaturas

class HistoricoController extends Controller
{
    public function historico()
    {
        // Buscar todos os dados de temperatura do banco (ajuste conforme sua tabela)
        $temperatures = Temperature::all(); 

        // Passar os dados para a view
        return view('historico', compact('temperatures'));
    }
}
