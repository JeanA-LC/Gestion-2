<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvinciaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_departamento' => 'required|exists:departamento,id_departamento',
            'nombre' => 'required|string|max:100'
        ];
    }
}