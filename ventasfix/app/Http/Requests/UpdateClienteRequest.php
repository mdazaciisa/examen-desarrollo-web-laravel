<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Detectar el nombre correcto del parámetro de ruta (id o cliente)
        $clienteId = $this->route('cliente') ?? $this->route('id');
        return [
            'rut_empresa' => [
                'required',
                'string',
                'unique:clientes,rut_empresa,' . $clienteId
            ],
            'rubro' => ['required', 'string'],
            'razon_social' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'direccion' => ['required', 'string'],
            'nombre_contacto' => ['required', 'string'],
            'email_contacto' => ['required', 'email'],
        ];
    }

    public function messages()
    {
        return [
            'rut_empresa.unique' => 'El rut empresa ya existe',
        ];
    }
}
