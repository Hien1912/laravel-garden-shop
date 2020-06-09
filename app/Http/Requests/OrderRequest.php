<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'phone' => ['required', 'regex:/^(0|+84)[1-9][\d]{8,10}/'],
            'address' => ['required', 'string','min:6', 'max:250'],
            'city' => ['required', 'min:3', 'max:100', 'string']
        ];
    }
}
