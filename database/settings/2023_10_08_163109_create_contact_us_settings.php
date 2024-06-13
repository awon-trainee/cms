<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact_us.email', '');
        $this->migrator->add('contact_us.phone', '');
        $this->migrator->add('contact_us.address', '');
        $this->migrator->add('contact_us.map', '');
        $this->migrator->add('contact_us.chief_executive_officer_name', '');
    }

    public function down(): void
    {
        $this->migrator->delete('contact_us.email');
        $this->migrator->delete('contact_us.phone');
        $this->migrator->delete('contact_us.address');
        $this->migrator->delete('contact_us.map');
        $this->migrator->delete('contact_us.chief_executive_officer_name');
    }
};
