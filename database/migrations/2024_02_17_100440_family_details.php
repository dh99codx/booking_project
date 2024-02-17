<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('family_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('natchatram')->nullable();
        });
    }

    public function down()
    {
        Schema::table('', function (Blueprint $table) {
            //
        });
    }
};
