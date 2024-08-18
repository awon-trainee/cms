<?php

namespace App\Http\Requests;

use App\Enums\type\ContactMessageType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'min:10', 'regex:/^([0-9\s\+]*)$/'],
            'type' => ['required', Rule::in(ContactMessageType::allowedValues())],
            'message' => ['required', 'string', 'max:1024'],
            'user_id' => 'nullable|exists:users,id', // Add validation for user_id

        ];
    }


    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب ان يكون نص',
            'name.max' => 'الاسم يجب ان لا يتجاوز :max حرف',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني يجب ان يكون بريد الكتروني صحيح',
            'email.max' => 'البريد الالكتروني يجب ان لا يتجاوز :max حرف',
            'phone.required' => 'رقم التواصل مطلوب',
            'phone.string' => 'رقم التواصل يجب ان يكون نص',
            'phone.max' => 'رقم التواصل يجب ان لا يتجاوز :max حرف',
            'phone.min' => 'رقم التواصل يجب ان لا يقل عن :min ارقام',
            'phone.regex' => 'رقم التواصل يجب ان يكون رقم تواصل صحيح',
            'type.required' => 'نوع الرسالة مطلوب',
            'type.in' => 'نوع الرسالة يجب ان يكون من الاختيارات المتاحة',
            'message.required' => 'الرسالة مطلوبة',
            'message.string' => 'الرسالة يجب ان تكون نص',
            'message.max' => 'الرسالة يجب ان لا تتجاوز :max حرف',
            'user_id.exists' => 'معرف المستخدم غير صالح',

        ];
    }
}