<?php

namespace Database\Seeders;

use App\Models\FamilyDetails;
use Illuminate\Database\Seeder;

class FamilyDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamilyDetails::factory()
            ->count(5)
            ->create();
    }
}
