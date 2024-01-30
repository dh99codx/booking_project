<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'given_name' => $this->faker->name(),
            'middle_name' => $this->faker->text(255),
            'family_name' => $this->faker->text(255),
            'dob' => $this->faker->date(),
            'address' => $this->faker->address(),
            'mobile_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique->email(),
            'email_verified_at' => now(),
            'password' => \Hash::make('password'),
            'news_letter_subscription' => $this->faker->boolean(),
            'privacy_policy_and_terms_of_condition' => $this->faker->boolean(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
