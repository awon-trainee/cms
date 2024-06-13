<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        try {
            $this->migrator->add('home.show_ads', true);
            $this->migrator->add('home.show_vision_and_message', true);
            $this->migrator->add('home.show_statistics', true);
            $this->migrator->add('home.show_news', true);
            $this->migrator->add('home.show_partners', true);
        } catch (Exception $e) {
        }
    }
    public function down(): void
    {
        $this->migrator->delete('home.show_ads');
        $this->migrator->delete('home.show_vision_and_message');
        $this->migrator->delete('home.show_statistics');
        $this->migrator->delete('home.show_news');
        $this->migrator->delete('home.show_partners');
    }
};
