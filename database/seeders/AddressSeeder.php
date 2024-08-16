<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'city' => 'damas',
            'region' => 'region1',
            'street' => 'street1',
            'near' => 'near1',
            'another_details' => '_',
            'longitude' => '36.303768811730095',
            'latitude' => '33.4943803229405',
            'created_by' => '1',
        ]);

        Address::create([
            'city' => 'damas',
            'region' => 'region2',
            'street' => 'street2',
            'near' => 'near2',
            'another_details' => '_',
            'longitude' => '36.303768811730095',
            'latitude' => '33.4943803229405',
            'created_by' => '1',
        ]);
    }
}
