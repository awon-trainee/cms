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
        Schema::create('ceo', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('telegram')->nullable();
            $table->string('mail')->nullable();
            $table->string('twitter')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ceo');
    }
};
