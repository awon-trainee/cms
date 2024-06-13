<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardMemberRequest extends FormRequest
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
        $sometimes = $this->method() == 'PUT' ? ['sometimes'] : [];
        return [
            'position_id' => ['required', 'integer', 'exists:positions,id'],
            'name' => ['required', 'string', 'max:255'],
            'picture' => $sometimes + ['required', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
            'stage_order' => ['required', 'integer', 'min:1'],
            'member_order' => ['required', 'integer', 'min:1'],
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
