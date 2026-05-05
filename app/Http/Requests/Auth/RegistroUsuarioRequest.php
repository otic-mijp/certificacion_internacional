<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistroUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'telefono_celular' => trim($this->telefono_celular),
            'telefono_local'   => trim($this->telefono_local),
        ]);
    }

    public function rules(): array
    {
        $phoneRegex = 'regex:/^\+?[0-9\s]+$/';

        return [
            'email'            => ['required', 'email', 'confirmed', 'max:255', 'unique:usuarios,email'],

            'telefono_celular' => ['required', 'string', 'min:7', 'max:30', $phoneRegex],
            'telefono_local'   => ['required', 'string', 'min:7', 'max:30', $phoneRegex],

            'profesion_id'     => ['required', 'exists:profesiones,id'],
            'estado_id'        => ['required', 'exists:estados,id'],
            'municipio_id'     => ['required', 'exists:municipios,id'],
            'parroquia_id'     => ['required', 'exists:parroquias,id'],
            'direccion'        => ['required', 'string', 'min:10', 'max:500'],
            'contrasena'       => [
                'required',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'             => 'El correo electrónico es obligatorio.',
            'email.confirmed'            => 'La confirmación del correo no coincide.',
            'email.unique'               => 'Este correo ya está en uso.',

            'telefono_celular.required'  => 'El teléfono celular es obligatorio.',
            'telefono_celular.regex'     => 'El formato del celular debe ser: +58 412 1234567 o 0412 1234567.',
            'telefono_local.required'    => 'El teléfono local es obligatorio.',
            'telefono_local.regex'       => 'El formato del teléfono local no es válido.',

            'estado_id.required'         => 'El estado es obligatorio para el registro.',
            'municipio_id.required'      => 'El municipio es obligatorio para el registro.',
            'profesion_id.required'      => 'Debe seleccionar una profesión.',
            'parroquia_id.required'      => 'La parroquia es obligatoria para el registro.',
            'direccion.required'         => 'La dirección de su residencia es obligatoria.',

            'contrasena.required'        => 'La contraseña es obligatoria.',
            'contrasena.confirmed'       => 'Las contraseñas no coinciden.',
        ];
    }
}
