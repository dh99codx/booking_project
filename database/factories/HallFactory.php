<?php

namespace Database\Factories;

use App\Models\Hall;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hall::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => $this->faker->name(),
            'Price' => $this->faker->randomNumber(1),
        ];
    }
}
