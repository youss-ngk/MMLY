<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\ProvinceSeeder;
use Database\Seeders\ProfessionSeeder;
use Database\Seeders\SpecializationSeeder;
use Database\Seeders\StructurePositionSeeder;
use Database\Seeders\EducationLevelSeeder;
use Database\Seeders\MemberSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            RegionSeeder::class,
            ProvinceSeeder::class,
            ProfessionSeeder::class,
            SpecializationSeeder::class,
            StructurePositionSeeder::class,
            EducationLevelSeeder::class,
            MemberSeeder::class,
        ]);
    }
}
