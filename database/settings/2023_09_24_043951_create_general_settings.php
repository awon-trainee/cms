<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.charity_title', '');
        $this->migrator->add('general.vision', '');
        $this->migrator->add('general.message', '');
        $this->migrator->add('general.goals', '');
        $this->migrator->add('general.donations_store_url', '');
        $this->migrator->add('general.charity_logo', '');
        $this->migrator->add('general.twitter_account', '');
        $this->migrator->add('general.snapchat_account', '');
        $this->migrator->add('general.instagram_account', '');
        $this->migrator->add('general.youtube_account', '');
        $this->migrator->add('general.whatsapp_account', '');
        $this->migrator->add('general.linkedin_account', '');
        $this->migrator->add('general.facebook_account', '');
    }

    public function down(): void
    {
        $this->migrator->delete('general.charity_title');
        $this->migrator->delete('general.vision');
        $this->migrator->delete('general.message');
        $this->migrator->delete('general.goals');
        $this->migrator->delete('general.donations_store_url');
        $this->migrator->delete('general.charity_logo');
        $this->migrator->delete('general.twitter_account');
        $this->migrator->delete('general.snapchat_account');
        $this->migrator->delete('general.instagram_account');
        $this->migrator->delete('general.youtube_account');
        $this->migrator->delete('general.whatsapp_account');
        $this->migrator->delete('general.linkedin_account');
        $this->migrator->delete('general.facebook_account');
    }
};
