<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
        return [
            'name'=>'required|max:15',
            'img'=>'image',
            'price'=>'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'name.max'=> 'Имя не может быть более 15 символов',
            'name.required'=> 'Поле "имя" должно быть заполнено',
            'img.image'=>'В поле изображение можно добавлять только картинку',
            'price.required'=> 'Поле "цена" должно быть заполнено',
            'price.min'=>'Цена не может меньше 1',
            'price.integer'=>'Цена должна быть задана числом',
        ];
    }
}
