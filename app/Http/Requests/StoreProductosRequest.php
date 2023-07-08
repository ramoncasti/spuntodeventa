<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductosRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'=>'string|required|unique:products|max:255',
            'imagen'=>'required|dimensions:min_width=100,min_height=200',
            'precio'=>'required',
            'category_id'=>'integer|required|exists:App\Category,id',
            'provider_id'=>'integer|required|exists:App\Provider,id',
        ];
    }
    public function messages(){
        return[
            'nombre.string'=>'El valor no es correcto',
            'nombre.required'=>'Este campo es requerido',
            'nombre.unique'=>'El producto ya esta registrado',
            'name.max'=>'Solo se permite 255 caracteres',

            'imagen.required'=>'Este campo es requerido',
            'imagen.dimensions'=>'Solo se permiten imagenes de 100x200px',

            'precio.required'=>'Este campo es requerido',

            'category_id.integer'=>'El valor tiene que ser entero',
            'category_id.required'=>'Este campo es requerido',
            'category_id.exists'=>'La categoria no existe',

            'provider_id.integer'=>'Este campo es requerido',
            'provider_id.required'=>'El valor tiene que ser entero',
            'provider_id.exists'=>'La categoria no existe',
        ];
    }
}
