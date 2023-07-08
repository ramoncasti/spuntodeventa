<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'nombre'=>'required|string|max:250',
            'ruc'=>'required|string|min:9|unique:clients,ruc'.
            $this->route('client')->id.'|max:9',
            'direccion'=>'nullable|string|max:250',
            'telefono'=>'nullable|string|min:10|unique:clients,telefono'.
            $this->route('client')->id.'|max:10',
            'correo'=>'nullable|email|string|unique:clients,email'.
            $this->route('client')->id.'|max:250',
        ];
    }
    public function messages(){
        return[
            'nombre.required'=>'Este campo es requerido',
            'nombre.string'=>'El valor no es correcto',
            'nombre.max'=>'Solo se permite 250 caracteres',

            'ruc.required'=>'Este campo es requerido',
            'ruc.string'=>'El valor no es correcto',
            'ruc.max'=>'Solo se permiten 9 caracteres',
            'ruc.min'=>'Se requiere de al menos 9 caracteres',
            'ruc.unique'=>'Ya se encuentra registrado',

            'direccion.string'=>'El valor no es correcto',
            'direccion.max'=>'Solo se permiten 250 caracteres',

            'telefono.string'=>'El valor no es correcto',
            'telefono.max'=>'Solo se permite 10 caracteres',
            'telefono.min'=>'Solo se permite 10 caracteres',
            'telefono.unique'=>'Ya se encuentra registrado',

            'correo.email'=>'No es un correo electronico',
            'correo.string'=>'El valor no es correcto',
            'correo.max'=>'Solo se permite 250 caracteres',
            'correo.unique'=>'Ya se encuentra registrado',
        ];
    }
}
