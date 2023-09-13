<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LeagueTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\League::insert([
            'leagues' => '1,39,135,2,3,6,9,10,17,140,137,531,78,848,40,41,45,46,61,88,206,255,253,399,398,504,539,536,570,677,667',
            'created_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s')
        ]);
    }
}
