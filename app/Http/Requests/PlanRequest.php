<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'plan.plan_name' => 'required|string',
            'plan.plan_body' => 'required|string',
        ];
    }
    
    public function attributes()
    {
        return[
            'plan.plan_name' => 'プラン名',
            'plan.plan_body' => 'プラン概要',
            ];
    }
}
