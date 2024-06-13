<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('aboutus.show_vision_and_message', true);
        $this->migrator->add('aboutus.show_values', true);
        $this->migrator->add('aboutus.show_fields', true);
        $this->migrator->add('aboutus.question', '');
        $this->migrator->add('aboutus.answer', '');
    }

    public function down(): void
    {
        $this->migrator->delete('aboutus.show_vision_and_message');
        $this->migrator->delete('aboutus.show_values');
        $this->migrator->delete('aboutus.show_fields');
        $this->migrator->delete('aboutus.question');
        $this->migrator->delete('aboutus.answer');
    }
};
