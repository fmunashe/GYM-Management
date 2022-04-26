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
            'plan_name'=>'required',
            'description'=>'required',
            'validity_period'=>'required',
            'amount'=>'required',
            'active'=>'required',
            'club_id'=>'required',
        ];
    }
}
