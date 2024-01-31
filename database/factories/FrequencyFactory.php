<?php

namespace Database\Factories;

use App\Models\Frequency;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FrequencyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Frequency::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(255),
            'days' => $this->faker->randomNumber(0),
        ];
    }
}
