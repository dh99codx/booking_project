<?php

namespace Database\Seeders;

use App\Models\SubscriberType;
use Illuminate\Database\Seeder;

class SubscriberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriberType::factory()
            ->count(5)
            ->create();
    }
}
