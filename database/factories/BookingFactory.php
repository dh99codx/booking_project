<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Check_In' => $this->faker->dateTime(),
            'Check_Out' => $this->faker->dateTime(),
            'Booking_Reference_No' => $this->faker->text(255),
            'Customer_Given_Name' => $this->faker->text(255),
            'Customer_Family_Name' => $this->faker->text(255),
            'Customer_Contact_Number' => $this->faker->text(255),
            'Customer_Email_Address' => $this->faker->text(255),
            'Total_Payment' => $this->faker->randomNumber(1),
            'Deposit_Made' => $this->faker->randomNumber(1),
            'Balance_Amount' => $this->faker->randomNumber(1),
            'Balance_Amount_Due' => $this->faker->randomNumber(1),
            'user_id' => \App\Models\User::factory(),
            'hall_id' => \App\Models\Hall::factory(),
        ];
    }
}
