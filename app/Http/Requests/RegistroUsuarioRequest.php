<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistroUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepara los datos antes de la validación.
     * Esto ayuda a normalizar la entrada del usuario.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            // Eliminamos espacios adicionales al inicio o final
            'telefono_celular' => trim($this->telefono_celular),
            'telefono_local'   => trim($this->telefono_local),
        ]);
    }

    public function rules(): array
    {
        // Expresión regular: permite un + opcional al inicio, seguido de números y espacios
        $phoneRegex = 'regex:/^\+?[0-9\s]+$/';

        return [
            'letra_cedula'     => ['required', 'string', 'size:1'],
            'cedula'           => ['required', 'numeric', 'unique:usuarios,cedula'],
            'nombres'          => ['required', 'string', 'max:100'], 
            'primer_apellido'  => ['required', 'string', 'max:100'],
            'segundo_apellido' => ['nullable', 'string', 'max:100'],
            'fecha_nacimiento' => ['required', 'date'],
            'sexo'             => ['required', 'in:M,F'],
            'email'            => ['required', 'email', 'confirmed', 'max:255', 'unique:usuarios,email'],
            
            // Reglas actualizadas para teléfonos
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
            'cedula.required'            => 'La cédula es obligatoria.',
            'cedula.unique'              => 'Esta cédula ya se encuentra registrada.',
            'nombres.required'           => 'Los nombres son obligatorios.',
            'primer_apellido.required'   => 'El primer apellido es obligatorio.',
            'fecha_nacimiento.required'  => 'La fecha de nacimiento es obligatoria.',
            'sexo.required'              => 'El sexo es obligatorio.',
            'sexo.in'                    => 'El sexo seleccionado no es válido.',
            
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