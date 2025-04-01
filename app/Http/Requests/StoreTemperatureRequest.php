<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemperatureRequest extends FormRequest
{
    /**
     * Obtenha as regras de validação que devem ser aplicadas à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "temperature" => "string"
        ];
    }
}