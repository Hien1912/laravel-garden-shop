<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => ['required', 'string', "unique:products,name,$this->id,id", 'max:250'],
            'avatar' => ['required', 'image', "mimes:jpg,jpeg,png"],
            'price' => ['required', 'min:10000', 'max:10000000000', 'integer'],
            'amount' => ['required', 'min:0', 'integer', 'max:10000']
        ];
    }
}
