<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('organizational_structure.image', '');
    }

    public function down(): void
    {
        $this->migrator->delete('organizational_structure.image');
    }
};
