<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('given_name');
            $table->string('middle_name');
            $table->string('family_name');
            $table->string('email_address');
            $table->string('contact_number');
            $table->date('dob');
            $table->string('relationship')->nullable();;
            $table->string('gothram')->nullable();;
            $table->string('rashi')->nullable();;
            $table->string('natchatram')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};
