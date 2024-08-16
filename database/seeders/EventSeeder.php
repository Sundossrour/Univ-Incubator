<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Event::create([
            'name' => 'Event1',
            'dayName' => 'Sunday',
            'eventDate' => '1/1/2000',
            'eventTime' => '01:00',
            'details' => 'no Details',
            'status' => '0',
            'created_by' => '1',
        ]);
    }
}
