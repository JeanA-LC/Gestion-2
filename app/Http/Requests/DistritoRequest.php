<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistritoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_provincia' => 'required|exists:provincia,id_provincia',
            'nombre' => 'required|string|max:100',
            'ubigeo' => 'required|string|max:6|unique:distrito,ubigeo'
        ];
    }
}