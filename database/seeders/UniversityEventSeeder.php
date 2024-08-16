<?php

namespace Database\Seeders;

use App\Models\UnivEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversityEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        UnivEvent::create([
            'universityID' => '1',
            'eventID' => '1',
        ]);

        UnivEvent::create([
            'universityID' => '2',
            'eventID' => '1',
        ]);
    }
}
