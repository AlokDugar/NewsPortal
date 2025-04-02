<?php

namespace Database\Seeders;

use App\Models\Setting;
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
            'name' => 'Alok Dugar',
            'email' => 'alokdugar4@gmail.com',
            'password'=>'123456'
        ]);
        DB::table('news_categories')->insert([
            [
            'name' => 'Test1',
            'status' => 'Active',
            'url'=>'https://www.google.co.uk/'
            ],
            [
                'name'=> 'Test2',
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
                'name' => 'Test',
                'allow_delete' => true
            ],
        ]);

        DB::table('advertisement_types')->insert([
            ['type' => 'Banner'],
            ['type' => 'Sidebar'],
            ['type' => 'Popup'],
            ['type' => 'Video'],
        ]);
        Setting::create([
            'website_name' => 'NewsPortal',
            'dashboard_logo'=> 'logo/logo.png',
        ]);
    }
}
