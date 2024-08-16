<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        University::create([
            'name' => 'Syrian Private University',
            'phone' => '098723498223',
            'status' => '1',
            'img' => 'img1.png',
            'type'=> '1',
            'address_id' => '1',
            'created_by' => '1',
        ]);


        University::create([
            'name' => 'Arab International University',
            'phone' => '0987654321',
            'status' => '1',
            'img' => 'img2.png',
            'type'=> '1',
            'address_id' => '2',
            'created_by' => '1',
        ]);
    }
}
