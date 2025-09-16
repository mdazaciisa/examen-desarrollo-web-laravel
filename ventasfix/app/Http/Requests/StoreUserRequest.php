<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user');
        $isUpdate = $this->method() === 'PUT' || $this->method() === 'PATCH';
        return [
            'rut' => ['required', 'string', 'unique:users,rut,' . ($isUpdate ? $userId : 'NULL')],
            'nombre' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            'email' => ['required', 'email', 'regex:/^[a-zA-Z]+\.[a-zA-Z]+@ventasfix\.cl$/', 'unique:users,email,' . ($isUpdate ? $userId : 'NULL')],
            'password' => [$isUpdate ? 'nullable' : 'required', 'string', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'email.regex' => 'El email debe tener el formato nombre.apellido@ventasfix.cl',
            'rut.unique' => 'El rut ya existe',
            'email.unique' => 'El email ya existe',
        ];
    }
    /**
     * Personaliza la respuesta de error de validación para la API.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if ($this->wantsJson()) {
            $response = response()->json([
                'message' => 'error',
                'errors' => $validator->errors(),
            ], 422);
            throw new \Illuminate\Validation\ValidationException($validator, $response);
        }
        parent::failedValidation($validator);
    }
}
