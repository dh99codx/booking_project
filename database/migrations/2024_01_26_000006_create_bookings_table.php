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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('Check_In');
            $table->dateTime('Check_Out');
            $table->string('Booking_Reference_No');
            $table->string('Customer_Given_Name');
            $table->string('Customer_Family_Name');
            $table->string('Customer_Contact_Number');
            $table->string('Customer_Email_Address');
            $table->decimal('Total_Payment');
            $table->decimal('Deposit_Made');
            $table->decimal('Balance_Amount');
            $table->decimal('Balance_Amount_Due');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('hall_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
