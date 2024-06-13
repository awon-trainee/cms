<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class OrganizationalStructureSettings extends Settings
{
    const IMAGE_PATH = 'https://awontech-cms.nyc3.digitaloceanspaces.com/public/organizational_structure/';
    const IMAGE_VIEW_PATH = 'https://awontech-cms.nyc3.digitaloceanspaces.com/public/organizational_structure/';

    public string $image;

    public static function group(): string
    {
        return 'organizational_structure';
    }

    public static function rules(): array
    {
        return [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ];
    }

    public function nameAr($key): string
    {
        return match ($key) {
            'image' => 'الصورة',
            default => '',
        };
    }
}
