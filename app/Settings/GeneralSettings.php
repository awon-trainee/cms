<?php

namespace App\Settings;

use App\Http\Contracts\Admin\SettingsRuler;
use App\Rules\ColorValidation;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings implements SettingsRuler
{

    const IMAGE_PATH = 'public/general_settings/';

    const IMAGE_VIEW_PATH = 'public/general_settings/';

    public string $charity_title;

    public string $vision;

    public string $message;

    public string $goals;

    public string $donations_store_url;

    public string $charity_logo;

    public string $twitter_account;

    public string $snapchat_account;

    public string $instagram_account;

    public string $youtube_account;

    public string $whatsapp_account;

    public string $linkedin_account;

    public string $facebook_account;

    public string $primary_color;

    public string $secondary_color;

    public string $third_color;

    public string $tictok_account;
    public string $telegram_account;
    public string $google_maps_location;
    public string $brief;

    public static function group(): string
    {
        return 'general';
    }

    public static function rules(): array
    {
        return [
            'charity_title' => ['nullable', 'string', 'max:100'],
            'brief' => ['nullable', 'string', 'max:1024'],
            'tictok_account' => ['nullable', 'url', 'max:512'],
            'telegram_account' => ['nullable', 'url', 'max:512'],
            'google_maps_location' => ['nullable'],
            'donations_store_url' => ['nullable', 'url', 'max:1024'],
            'twitter_account' => ['nullable', 'url', 'max:512'],
            'snapchat_account' => ['nullable', 'url', 'max:512'],
            'instagram_account' => ['nullable', 'url', 'max:512'],
            'youtube_account' => ['nullable', 'url', 'max:512'],
            'whatsapp_account' => ['nullable', 'url', 'max:512'],
            'linkedin_account' => ['nullable', 'url', 'max:512'],
            'facebook_account' => ['nullable', 'url', 'max:512'],
            'vision' => ['nullable', 'string', 'max:1024'],
            'message' => ['nullable', 'string', 'max:1024'],
            'goals' => ['nullable', 'string', 'max:1024'],
            'charity_logo' => ['sometimes', 'required', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
            'primary_color' => ['nullable', new ColorValidation],
            'secondary_color' => ['nullable', new ColorValidation],
            'third_color' => ['nullable', new ColorValidation],
        ];
    }

    public function nameAr($key): string
    {
        return match ($key) {
            'charity_title' => 'اسم الجمعية',
            'brief' => 'نبذة عنا',
            'vision' => 'الرؤية',
            'message' => 'الرسالة',
            'goals' => 'الأهداف',
            'donations_store_url' => 'رابط متجر التبرعات',
            'charity_logo' => 'شعار الجمعية',
            'twitter_account' => 'حساب تويتر',
            'tictok_account' => 'حساب تك توك',
            'telegram_account' => 'حساب التلقرام',
            'google_maps_location' => 'موقع الخريطة',
            'snapchat_account' => 'حساب سناب شات',
            'instagram_account' => 'حساب انستقرام',
            'youtube_account' => 'حساب يوتيوب',
            'whatsapp_account' => 'حساب واتساب',
            'linkedin_account' => 'حساب لينكد إن',
            'facebook_account' => 'حساب فيسبوك',
            'primary_color' => 'اللون الأساسي',
            'secondary_color' => 'اللون الثانوي',
            'third_color' => 'اللون الثالث',
            default => '',
        };
    }

    public function rgbPrimaryColor(): string
    {
        return implode(", ", $this->hex2rgb($this->primary_color));
    }

    public function rgbSecondaryColor(): string
    {
        return implode(", ", $this->hex2rgb($this->secondary_color));
    }

    public function rgbThirdColor(): string
    {
        return implode(", ", $this->hex2rgb($this->third_color));
    }

    private function hex2rgb($hexCode){
        return sscanf($hexCode, "#%02x%02x%02x");
    }
}
