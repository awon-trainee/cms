<?php

namespace App\Settings;

use App\Http\Contracts\Admin\SettingsRuler;
use Spatie\LaravelSettings\Settings;

class AboutUsPageSettings extends Settings implements SettingsRuler
{
    public bool $show_vision_and_message;

    public bool $show_values;

    public bool $show_fields;

    public string $question;

    public string $answer;

    public static function group(): string
    {
        return 'aboutus';
    }

    public static function rules(): array
    {
        return [
            'show_vision_and_message' => 'nullable|boolean',
            'show_values' => 'nullable|boolean',
            'show_fields' => 'nullable|boolean',
            'question' => 'nullable|string|max:255',
            'answer' => 'nullable|string|max:2048',
        ];
    }

    public function nameAr($key): string
    {
        return match ($key) {
            'show_vision_and_message' => 'عرض الرؤية والرسالة',
            'show_values' => 'عرض القيم',
            'show_fields' => 'عرض الحقول',
            'question' => 'السؤال',
            'answer' => 'الإجابة',
            default => '',
        };
    }
}
