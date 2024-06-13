<?php

namespace App\Settings;

use App\Http\Contracts\Admin\SettingsRuler;
use Spatie\LaravelSettings\Settings;

class ContactUsSetting extends Settings implements SettingsRuler
{
    public string $email;

    public string $phone;

    public string $address;

    public string $map;

    public string $chief_executive_officer_name;

    public static function group(): string
    {
        return 'contact_us';
    }

    public static function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'size:13', 'starts_with:+966'],
            'address' => ['required', 'string', 'min:1', 'max:255'],
            'map' => ['required', 'string', 'min:1', 'max:1024'],
            'chief_executive_officer_name' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }

    public function nameAr($key): string
    {
        return match ($key) {
            'email' => 'البريد الإلكتروني',
            'phone' => 'رقم الهاتف',
            'address' => 'العنوان',
            'map' => 'الخريطة',
            'chief_executive_officer_name' => 'اسم المدير التنفيذي',
            default => '',
        };
    }
}
