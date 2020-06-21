<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateProduct extends FormRequest
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
        return [
            'name' => ['required', 'string', "unique:products,name,$request->id,id", 'max:250'],
            'avatarcheck' => ['image', "mimes:jpg,jpeg,png"],
            'price' => ['required', 'min:10000', 'max:10000000000', 'integer'],
            'amount' => ['required', 'min:0', 'integer', 'max:10000']
        ];
    }
}
