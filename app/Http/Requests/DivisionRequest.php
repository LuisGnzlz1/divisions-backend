<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class DivisionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $nameRule = 'required|unique:divisions,name|max:45';
        $divisionid = array_key_exists('id', $request->all()) ? $request->all()['id'] : null;

        if($divisionid){
            $nameRule = 'required|unique:divisions,name,'.$divisionid.',id|max:45';
        }

        $rules = [
            'name'                => $nameRule,
            'parent_division_id'  => 'integer',
            'level'               => 'required|integer|min:1',
            'collaborators'       => 'required|integer|min:1',
            'ambassador'          => 'string',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'                    => 'El nombre de la division es requerido',
            'name.unique'                      => 'El nombre de la division debe ser unico',
            'name.max'                         => 'El nombre de la division debe contener como maximo 45 caracteres',
            'parent_division_id.integer'       => 'La division superior debe ser un entero valido',
            'level.required'                   => 'El nivel es requerido',
            'level.integer'                    => 'El nivel debe ser un numero entero valido',
            'level.min'                        => 'El nivel debe ser un numero entero positivo valido',
            'collaborators.required'           => 'La cantidad de colaboradores es requerido',
            'collaborators.integer'            => 'La cantidad de colaboradores debe ser un numero entero valido',
            'collaborators.min'                => 'La cantidad de colaboradores debe ser un numero entero positivo valido',
            'ambassador.string'                => 'El nombre del embajador debe ser de tipo texto',
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['code' => 422, 'msj' => $validator->errors()->first()], 422));
    }
}
