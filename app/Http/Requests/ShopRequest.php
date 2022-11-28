<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'shop.name' => 'required|string|max:100',
            'shop.money' => 'required|integer',
            'shop.address' => 'required',
        ];
    }
    
    public function attributes()
    {
        return[
            'shop.name' => '店名',
            'shop.money' => '金額',
            'shop.address' => '住所',
            ];
    }
}
