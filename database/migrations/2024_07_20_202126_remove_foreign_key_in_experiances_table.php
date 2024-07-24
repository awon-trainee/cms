<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('experiances', function($table) {
            $table->dropColumn('board_member_id');
        });
    }

    public function down()
    {
        Schema::table('experiances', function($table) {
            $table->integer('board_member_id');
        });
    }
};
