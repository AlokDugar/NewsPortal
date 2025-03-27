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
            'name' => 'Alok',
            'status' => 'Active',
            'url'=>'https://www.google.co.uk/'
            ],
            [
                'name'=> 'Test',
                'status'=>'Inactive',
                'url'=>'https://www.google.co.uk/'
            ]
        ]);
        DB::table('types')->insert([
            [
                'id' => 1,
                'name' => 'Breaking News',
                'allow_delete' => false
            ],
            [
                'id' => 2,
                'name' => 'Trending News',
                'allow_delete' => false
            ],
            [
                'id' => 3,
                'name' => 'Alok',
                'allow_delete' => true
            ],
        ]);

        DB::table('advertisement_types')->insert([
            ['type' => 'Banner'],
            ['type' => 'Sidebar'],
            ['type' => 'Popup'],
            ['type' => 'Video'],
        ]);

        DB::table('advertisements')->insert([
            [
                'type_id' => 1,
                'details' => 'ads/banner1.jpg',
                'status' => 'Active',
                'url' => 'https://example.com/banner1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_id' => 2,
                'details' => 'ads/sidebar1.jpg',
                'status' => 'Active',
                'url' => 'https://example.com/sidebar1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_id' => 3,
                'details' => 'ads/popup1.jpg',
                'status' => 'Inactive',
                'url' => 'https://example.com/popup1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_id' => 4,
                'details' => 'ads/video1.mp4',
                'status' => 'Active',
                'url' => 'https://example.com/video1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
