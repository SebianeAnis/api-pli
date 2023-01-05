<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGarageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required",
            "pic_name" => "required|max:70",
            "adress" => "required|max:70",
            "postal_code" => "required|max:70",
            "city" => "required|max:70",
            "country" => "required|max:70",
            "number" => "required|max:70"
        ];
    }
}
