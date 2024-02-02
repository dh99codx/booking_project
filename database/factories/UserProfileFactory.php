<?php

namespace Database\Factories;

use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contact_number_landline' => $this->faker->text(255),
            'gothram' => $this->faker->text(255),
            'rashi' => $this->faker->text(255),
            'natchatram' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
