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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('success_msg')->default(0)->nullable();
            $table->string('given_name');
            $table->string('middle_name');
            $table->string('family_name');
            $table->date('dob');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('news_letter_subscription')->default('0')->nullable();
            $table->boolean('privacy_policy_and_terms_of_condition')->default('0')->nullable();
            $table->string('remember_token', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
