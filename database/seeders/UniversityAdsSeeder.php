<?php

namespace Database\Seeders;

use App\Models\UniversityAds;
use App\Models\UniversityCollegeAds;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversityAdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        UniversityAds::create([
            'name' => 'ads1',
            'title' => 'tit1',
            'body' => 'bod1',
            'details' => 'det1',
            'img' => 'img1',
            'universityID'=>'1',
            'created_by' => '1',
        ]);
    }
}
