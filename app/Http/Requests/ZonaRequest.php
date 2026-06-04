<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZonaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_distrito' => 'required|exists:distrito,id_distrito',
            'nombre' => 'required|string|max:150',
            'tipo' => 'required|in:CENTRO_POBLADO,CASERIO,BARRIO,URBANIZACION,SECTOR',
            'descripcion' => 'nullable|string|max:255'
        ];
    }
}