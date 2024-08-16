<?php

namespace Database\Seeders;

use App\Models\CollegeAds;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeAdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        CollegeAds::create([
            'name' => 'ads1',
            'title' => 'tit1',
            'body' => 'bod1',
            'details' => 'det1',
            'img' => 'img1',
            'univCollegeID'=>'1',
            'created_by' => '1',
        ]);
    }
}
