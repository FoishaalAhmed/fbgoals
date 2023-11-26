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
        $this->call(LeagueTableSeeder::class);
        $this->command->info('Leagues Seeded Successfully!');
        $this->call(FeaturedMatchTableSeeder::class);
        $this->command->info('Featured Matches Seeded Successfully!');
        $this->call(TeamTableSeeder::class);
        $this->command->info('Teams Seeded Successfully!');
        $this->call(RoleTableSeeder::class);
        $this->command->info('Roles Seeded Successfully!');
        $this->call(PermissionTableSeeder::class);
        $this->command->info('Permissions Seeded Successfully!');
        $this->call(SettingTableSeeder::class);
        $this->command->info('Settings Seeded Successfully!');
        $this->call(SeasonTableSeeder::class);
        $this->command->info('Seasons Seeded Successfully!');
        $this->call(AdTableSeeder::class);
        $this->command->info('Ads Seeded Successfully!');
    }
}
