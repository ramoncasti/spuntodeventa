<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:200|unique:providers',
            'ruc_number'=>'required|string|max:9|min:9|unique:providers',
            'adress'=>'nullable|string|max:255',
            'phone'=>'required|string|max:10|min:10|unique:providers',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permite 255 caracteres',

            'name.required'=>'Este campo es requerido',
            'email.email'=>'No es un correo electronico',
            'email.string'=>'El valor no es correcto',
            'email.max'=>'Solo se permite 200 caracteres',
            'email.unique'=>'Ya se encuentra registrado',

            'ruc_number.required'=>'Este campo es requerido',
            'ruc_number.string'=>'El valor no es correcto',
            'ruc_number.max'=>'Solo se permiten 9 caracteres',
            'ruc_number.min'=>'Se requiere de al menos 9 caracteres',
            'ruc_number.unique'=>'Ya se encuentra registrado',

            'adress.string'=>'El valor no es correcto',
            'adress.max'=>'Solo se permiten 255 caracteres',

            'phone.required'=>'Este campo es requerido',
            'phone.string'=>'El valor no es correcto',
            'phone.max'=>'Solo se permite 10 caracteres',
            'phone.min'=>'Solo se permite 10 caracteres',
            'number.unique'=>'Ya se encuentra registrado',
        ];
    }
}
