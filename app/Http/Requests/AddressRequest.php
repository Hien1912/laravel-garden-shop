<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequest
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
        $citylist = ["Hà Nội","Hồ Chí Minh","Đắk Lắk","Hà Tĩnh","Điện Biên","Nghệ An","Tiền Giang","Hải Phòng","An Giang","Bà Rịa - Vũng Tàu","Bắc Giang","Bắc Kạn","Bạc Liêu","Bắc Ninh","Bến Tre","Bình Định","Bình Dương","Bình Phước","Bình Thuận","Cà Mau","Cao Bằng","Đắk Nông","Đồng Nai","Đồng Tháp","Gia Lai","Hà Giang","Hà Nam","Hải Dương","Hậu Giang","Hòa Bình","Hưng Yên","Khánh Hòa","Kiên Giang","Kon Tum","Lai Châu","Lâm Đồng","Lạng Sơn","Lào Cai","Long An","Nam Định","Ninh Bình","Ninh Thuận","Phú Thọ","Quảng Bình","Quảng Nam","Quảng Ngãi","Quảng Ninh","Quảng Trị","Sóc Trăng","Sơn La","Tây Ninh","Thái Bình","Thái Nguyên","Thanh Hóa","Thừa Thiên Huế","Trà Vinh","Tuyên Quang","Vĩnh Long","Vĩnh Phúc","Yên Bái","Phú Yên","Cần Thơ","Đà Nẵng"];
        return [
            'name' => ['required', 'string', 'min:3', 'max:50', 'regex:/[\w]/i'],
            'phone' => ['required', 'regex:/^(0|\+84)[\d]{9,12}/i'],
            'address' => ['required', 'string','min:6', 'max:250'],
            'city' => ['required', 'min:3', 'max:100', 'string', Rule::in($citylist)]
        ];
    }
}
