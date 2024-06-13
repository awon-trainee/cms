<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.primary_color', '#8c5ab4');
        $this->migrator->add('general.secondary_color', '#8752b1');
        $this->migrator->add('general.third_color', '#ebdff5');
    }

    public function down(): void
    {
        $this->migrator->delete('general.primary_color');
        $this->migrator->delete('general.secondary_color');
        $this->migrator->delete('general.third_color');
    }
};
