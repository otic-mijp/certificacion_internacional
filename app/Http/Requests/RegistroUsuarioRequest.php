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

    public function rules(): array
    {
        return [
            // 1. Datos de Identidad (Vienen de los campos hidden y readonly)
            'letra_cedula'       => ['required', 'string', 'size:1'],
            'cedula'             => ['required', 'numeric', 'unique:usuarios,cedula'],
            'nombres'            => ['required', 'string', 'max:55'],
            'primer_apellido'    => ['required', 'string', 'max:100'],
            'segundo_apellido'   => ['nullable', 'string', 'max:100'],
            'fecha_nacimiento'   => ['required', 'date'],
            'sexo'               => ['required', 'in:M,F'],

            // 2. Datos de Contacto
            'correo_electronico' => ['required', 'email', 'confirmed', 'max:255', 'unique:usuarios,correo_electronico'],
            'telefono_celular'   => ['required', 'numeric', 'digits_between:7,11'],
            'telefono_local'     => ['required', 'numeric', 'digits_between:7,11'],

            // 3. Ubicación y Profesión (IDs foraneos)
            'profesion_id'       => ['required', 'exists:profesiones,id'],
            'estado_id'          => ['required', 'exists:estados,id'],
            'municipio_id'       => ['required', 'exists:municipios,id'],
            'parroquia_id'       => ['required', 'exists:parroquias,id'],

            // 4. Dirección
            'direccion'          => ['required', 'string', 'min:10', 'max:500'],

            // 5. Seguridad (Usamos 'password' por convención, luego mapeamos a 'contrasena')
            'contrasena'           => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
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
            
            'correo_electronico.required' => 'El correo electrónico es obligatorio.',
            'correo_electronico.confirmed'=> 'La confirmación del correo no coincide.',
            'correo_electronico.unique'   => 'Este correo ya está en uso.',
            
            'telefono_celular.required'   => 'El teléfono celular es obligatorio.',
            'telefono_local.required'   => 'El teléfono local es obligatorio.',
            
            'profesion_id.required'       => 'Debe seleccionar una profesión.',
            'parroquia_id.required'       => 'La parroquia es obligatoria para el registro.',
            
            'contrasena.required'           => 'La contraseña es obligatoria.',
            'contrasena.confirmed'          => 'Las contraseñas no coinciden.',
        ];
    }
}