<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBrandRequest extends FormRequest
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
    public function rules()
    {
        $id = ((is_object($this->brand)) ? $this->brand->id : $this->brand)??null;
        return [
            'name'=>[
                'min:3',
                'required',
                'max:150',
                //'unique:brands:name,'.$id,
             //   Rule::unique('brands','name')->ignore($id),
            ],
        ];

    }

    public function messages()
    {
        return [
           'name.min'=> 'Сообщение об ошибке',
            'name.unique' => 'Такое имя уже занято',
        ];
    }
}
