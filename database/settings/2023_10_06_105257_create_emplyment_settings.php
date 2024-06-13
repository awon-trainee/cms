<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('employment.title', '');
        $this->migrator->add('employment.description', '');
    }

    public function down(): void
    {
        $this->migrator->delete('employment.title');
        $this->migrator->delete('employment.description');
    }
};
