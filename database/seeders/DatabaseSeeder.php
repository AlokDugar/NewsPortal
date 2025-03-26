<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        DB::table('admins')->insert([
            'name' => 'Alok Dugar',
            'email'=>'alokdugar4@gmail.com',
            'password' => Hash::make('123456')
        ]);
        DB::table('news_categories')->insert([
            [
            'name' => 'Alok Dugar',
            'status' => 'Active',
            'url'=>'https://www.google.co.uk/'
            ],
            [
                'name'=> 'Manish',
                'status'=>'Pending',
                'url'=>'https://www.google.co.uk/'
            ]
        ]);
        DB::table('types')->insert([
            [
                'id' => 1,
                'name' => 'Breaking News'
            ],
            [
                'id' => 2,
                'name' => 'Trending News'
            ],
            [
                'id' => 3,
                'name' => 'Alok'
            ],
        ]);

    }
}
