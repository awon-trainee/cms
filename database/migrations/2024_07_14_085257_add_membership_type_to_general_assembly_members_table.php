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
        Schema::table('general_assembly_members', function (Blueprint $table) {
            $table->string('membership_type')->nullable();
            $table->string('term_council')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_assembly_members', function (Blueprint $table) {
            $table->dropColumn('membership_type');
            $table->dropColumn('term_council');
        });
    }
};
