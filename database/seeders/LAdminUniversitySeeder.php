<?php

namespace Database\Seeders;

use App\Models\LAdminUniversity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LAdminUniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LAdminUniversity::create([
            'universityId' => '1',
            'ladminID' => '1',
        ]);

        LAdminUniversity::create([
            'universityId' => '2',
            'ladminID' => '1',
        ]);
    }
}
