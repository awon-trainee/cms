<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('charity_team_members', function (Blueprint $table) {
            $table->string('picture')->nullable();
            $table->string('phone')->nullable();
            $table->string('twitter')->nullable();
            $table->string('mail')->nullable();
            $table->string('telegram')->nullable();
        });

        Schema::table('general_assembly_members', function (Blueprint $table) {
            $table->string('picture')->nullable();
            $table->string('phone')->nullable();
            $table->string('twitter')->nullable();
            $table->string('mail')->nullable();
            $table->string('telegram')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('charity_team_members', function (Blueprint $table) {
            $table->dropColumn('picture');
            $table->dropColumn('phone');
            $table->dropColumn('twitter');
            $table->dropColumn('mail');
            $table->dropColumn('telegram');
        });

        Schema::table('general_assembly_members', function (Blueprint $table) {
            $table->dropColumn('picture');
            $table->dropColumn('phone');
            $table->dropColumn('twitter');
            $table->dropColumn('mail');
            $table->dropColumn('telegram');
        });
    }
};
