<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperianceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'position' => 'required|min:3|max:255',
            'start_at' => 'required',
            'end_at' => 'required|min:5|max:255',
            'employer' => 'required|min:5|max:255',
            'board_member_id' => 'required',
            'tasks' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
