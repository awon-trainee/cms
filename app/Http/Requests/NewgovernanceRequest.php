<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewgovernanceRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:60'],
            'file' => ['required', 'file', 'mimes:pdf'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'العنوان',
            'file' => 'الملف',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'يرجى إدخال العنوان.',
            'title.string' => 'يجب أن يكون العنوان نصياً.',
            'title.max' => 'يجب ألا يزيد طول العنوان عن 60 حرفًا.',
            'file.required' => 'يرجى تحميل الملف.',
            'file.file' => 'يجب أن يكون الملف من نوع صحيح.',
            'file.mimes' => 'يجب أن يكون الملف بصيغة PDF.',
        ];
    }
}
