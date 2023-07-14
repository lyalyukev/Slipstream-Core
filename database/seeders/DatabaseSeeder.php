<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Slip;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        Video::factory(20)->for(Slip::factory(), 'slip')->create();
        Slip::factory(50)->for(
            Video::factory(), 'mediable'
        )->create();
//         \App\Models\User::factory()->create([https://laravel.com/docs/10.x/eloquent-factories#polymorphic-relationships
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
    }
}
