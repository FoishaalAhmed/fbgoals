<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(LeagueTablesSeeder::class);
        $this->command->info('Leagues Seeded Successfully!');
        $this->call(FeaturedMatchTablesSeeder::class);
        $this->command->info('Featured Matches Seeded Successfully!');
    }
}
