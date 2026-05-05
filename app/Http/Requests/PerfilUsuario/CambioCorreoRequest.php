<?php

namespace App\Http\Requests\PerfilUsuario;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CambioCorreoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:usuarios,email|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El nuevo correo es obligatorio.',
            'email.email' => 'Por favor, ingresa un formato de correo válido.',
            'email.unique' => 'Este correo ya está registrado por otro usuario.',
            'email.confirmed' => 'La confirmación del correo no coincide.',
        ];
    }
}
