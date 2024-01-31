<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FamilyDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FamilyDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'given_name' => $this->faker->text(255),
            'middle_name' => $this->faker->text(255),
            'family_name' => $this->faker->text(255),
            'email_address' => $this->faker->text(255),
            'contact_number' => $this->faker->text(255),
            'dob' => $this->faker->date(),
            'relationship' => $this->faker->text(255),
            'gothram' => $this->faker->text(255),
            'rashi' => $this->faker->text(255),
            'natchatram' => $this->faker->text(255),
        ];
    }
}
