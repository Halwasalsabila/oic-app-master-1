<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        // \App\Models\Project::factory(2)->create();
        DB::table('projects')->insert([
            ['name' => 'TFCA (Kons.OIC)', 'slug' => 'tfca'],
            ['name' => 'US-EMBASSY', 'slug' => 'us-embassy'],
        ]);
    }
}
