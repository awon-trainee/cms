<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MembershipSettings extends Settings
{
    public string $title;

    public string $description;

    public static function group(): string
    {
        return 'membership';
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
