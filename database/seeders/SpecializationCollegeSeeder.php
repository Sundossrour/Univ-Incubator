<?php

namespace Database\Seeders;

use App\Models\CollegeSpecialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationCollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        CollegeSpecialization::create([
            'name' => 'Software Engineering And Information Systems',
            'created_by' => '1',
            'univCollegeID' => '1',
        ]);
    }
}
