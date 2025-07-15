<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClientsSeeder::class,
            FaqSeeder::class,
            HomeContentSeeder::class,
            OfferContentSeeder::class,
            PermissionSeeder::class,
            PlanSeeder::class,
            ReviewSeeder::class,
            RoleSeeder::class,
            TeamSeeder::class,
            UserSeeder::class,
            WorkProcessSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
