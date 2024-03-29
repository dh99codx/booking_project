<?php

namespace Database\Factories;

use App\Models\Subscriber;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscriber::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token' => $this->faker->text(),
            'status' => $this->faker->boolean(),
            'email' => $this->faker->email(),
            'subscriber_type_id' => \App\Models\SubscriberType::factory(),
            'frequency_id' => \App\Models\Frequency::factory(),
        ];
    }
}
