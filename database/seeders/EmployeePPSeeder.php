<?php

namespace Database\Seeders;

use App\Models\EmployeePP;
use Illuminate\Database\Seeder;

class EmployeePPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeePP::factory()->count(5)->create();
    }
}
