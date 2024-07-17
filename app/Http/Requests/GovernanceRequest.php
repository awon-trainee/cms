<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GovernanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ar' => 'required|string|max:255',
        ];
    }
}
