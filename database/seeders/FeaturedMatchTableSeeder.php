<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeaturedMatchTableSeeder extends Seeder
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
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
