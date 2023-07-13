<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create([
            'id' => NULL,
            'name' => 'Joanny Farrell',
            'username' => 'admin',
            'photo_profile' => 'profiles/cTIEOT4rN3HuAXDkFZzTHvSUnrGMAySTR6DaUriZ.jpg',
            'email' => 'scotty58@example.org',
            'email_verified_at' => '2023-07-10 07:44:16',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'active' => '1',
            'roles' => 'ADMIN',
            'remember_token' => '5uaxJIicuWf7GojOw3kmunyQwC0DYLqJ5eDZYYX5EcrNbgL2qZtG4ysdxwpz',
            'created_at' => '2023-07-10 07:44:16',
            'updated_at' => '2023-07-11 15:29:04'
        ]);

        User::create([
            'id' => NULL,
            'name' => 'Mr. Francisco Volkman',
            'username' => 'yayasan',
            'photo_profile' => NULL,
            'email' => 'marguerite.halvorson@example.com',
            'email_verified_at' => '2023-07-10 07:44:16',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'active' => '1',
            'roles' => 'YAYASAN',
            'remember_token' => '6TO3LSzTnyh5rTPmKrLp9EFMibjoP0HKED9IY5d022LubJkPwG1oFemjiYmc',
            'created_at' => '2023-07-10 07:44:16',
            'updated_at' => '2023-07-10 07:44:16'
        ]);

        User::create([
            'id' => NULL,
            'name' => 'Lizeth Reichel',
            'username' => 'direktur',
            'photo_profile' => NULL,
            'email' => 'kuphal.fredrick@example.net',
            'email_verified_at' => '2023-07-10 07:44:16',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'active' => '1',
            'roles' => 'DIREKTUR',
            'remember_token' => 'mmzHye6gSt',
            'created_at' => '2023-07-10 07:44:16',
            'updated_at' => '2023-07-10 07:44:16'
        ]);
        \App\Models\User::factory(3)->create();
        // \App\Models\Project::factory(2)->create();
        DB::table('projects')->insert([
            ['name' => 'TFCA (Kons.OIC)', 'slug' => 'tfca'],
            ['name' => 'US-EMBASSY', 'slug' => 'us-embassy'],
        ]);
    }
}
