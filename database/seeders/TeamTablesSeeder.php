<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Team::insert([
            'teams' => '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30',
            'created_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s')
        ]);
    }
}
