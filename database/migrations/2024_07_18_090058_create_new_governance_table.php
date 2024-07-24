<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('newgovernances', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60);
            $table->string('file');
            $table->unsignedBigInteger('at_page'); // Foreign key field
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('at_page')->references('id')->on('governances')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newgovernances');
    }
};
