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
        Schema::table('qualifications', function (Blueprint $table) {
            // $table->foreignIdFor(\App\Models\Members::class)->change();
            $table->foreignId('members_id')->constrained('members')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('qualifications', function (Blueprint $table) {
            //
        });
    }
};
