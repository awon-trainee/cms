<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.tictok_account', '');
        $this->migrator->add('general.telegram_account', '');
        $this->migrator->add('general.google_maps_location', '');
    }

    public function down(): void
    {
        $this->migrator->delete('general.tictok_account');
        $this->migrator->delete('general.telegram_account');
        $this->migrator->delete('general.google_maps_location', '');
    }
};
