<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UniversityCollege;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(GAdminSeeder::class);
        $this->call(LAdminSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(LAdminUniversitySeeder::class);
        $this->call(UniversityCollegeSeeder::class);
        $this->call(CollegeEventSeeder::class);
        $this->call(TeachingStaffSeeder::class);
        $this->call(UserSSeeder::class);
        $this->call(QuestionUserSeeder::class);
        $this->call(CollegeAdsSeeder::class);
        $this->call(CollegeFeesSeeder::class);
        $this->call(SpecializationCollegeSeeder::class);
        $this->call(UniversityAdsSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(UniversityEventSeeder::class);

    }
}
