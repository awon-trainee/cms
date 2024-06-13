<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('membership.title', '');
        $this->migrator->add('membership.description', '');
    }

    public function down(): void
    {
        $this->migrator->delete('membership.title');
        $this->migrator->delete('membership.description');
    }
};
