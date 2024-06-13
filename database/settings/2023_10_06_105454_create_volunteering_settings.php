<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('volunteering.title', '');
        $this->migrator->add('volunteering.description', '');
    }

    public function down(): void
    {
        $this->migrator->delete('volunteering.title');
        $this->migrator->delete('volunteering.description');
    }
};
