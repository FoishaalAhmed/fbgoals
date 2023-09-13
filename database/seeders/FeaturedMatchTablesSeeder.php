<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeaturedMatchTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FeaturedMatch::insert([
            'title' => 'Todays Hot Match',
            'match_id' => '1035058',
            'created_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s')
        ]);
    }
}
