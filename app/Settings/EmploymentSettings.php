<?php

namespace App\Settings;

use App\Http\Contracts\Admin\SettingsRuler;
use Spatie\LaravelSettings\Settings;

class EmploymentSettings extends Settings implements SettingsRuler
{
    public string $title;

    public string $description;

    public static function group(): string
    {
        return 'employment';
    }

    public static function rules(): array
    {
        return [
            'title' => [ 'required', 'string', 'max:255' ],
            'description' => [ 'required', 'string', 'max:2048' ],
        ];
    }

    public function nameAr($key): string
    {
        return match ($key) {
            'title' => 'العنوان',
            'description' => 'الوصف',
            default => '',
        };
    }
}
