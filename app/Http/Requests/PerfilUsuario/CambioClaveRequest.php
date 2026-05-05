<?php

namespace App\Http\Requests\PerfilUsuario;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CambioClaveRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => 'Debes ingresar tu clave actual.',
            'password.required' => 'La nueva clave es obligatoria.',
            'password.confirmed' => 'La confirmación de la nueva clave no coincide.',
            'password.min' => 'La nueva clave debe tener al menos 8 caracteres.',
        ];
    }
}
