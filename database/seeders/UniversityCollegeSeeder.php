<?php

namespace Database\Seeders;

use App\Models\UniversityCollege;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversityCollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        UniversityCollege::create([
            'collegeName' => 'Information Engineering',
            'created_by' => '1',
            'universityId' => '1'
        ]);

        UniversityCollege::create([
            'collegeName' => 'Business Management',
            'created_by' => '1',
            'universityId' => '1'
        ]);
    }
}
