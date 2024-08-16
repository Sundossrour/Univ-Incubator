<?php

namespace Database\Seeders;

use App\Models\CollegeFees;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeFeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CollegeFees::create([
            'annualFees' => 'no ',
            'annualFeesNumber' => '200',
            'details' => 'No Details' ,
            'annualFeesDate' => '2024-01-18',
            'univCollegeID' => '1',
            'created_by' => '1',
        ]);
    }
}
