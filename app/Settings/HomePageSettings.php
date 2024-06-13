<?php

namespace App\Settings;

use App\Http\Contracts\Admin\SettingsRuler;
use Spatie\LaravelSettings\Settings;

class HomePageSettings extends Settings implements SettingsRuler
{
    public bool $show_ads;

    public bool $show_vision_and_message;

    public bool $show_statistics;

    public bool $show_news;

    public bool $show_partners;

    public static function group(): string
    {
        return 'home';
    }

    public static function rules(): array
    {
        return [
            'show_ads' => 'nullable|boolean',
            'show_vision_and_message' => 'nullable|boolean',
            'show_statistics' => 'nullable|boolean',
            'show_news' => 'nullable|boolean',
            'show_partners' => 'nullable|boolean',
        ];
    }

    public function nameAr($key): string
    {
        return match ($key) {
            'show_ads' => 'إظهار الإعلانات',
            'show_vision_and_message' => 'إظهار الرؤية والرسالة',
            'show_statistics' => 'إظهار الإحصائيات',
            'show_news' => 'إظهار الأخبار',
            'show_partners' => 'إظهار الشركاء',
            default => '',
        };
    }
}
