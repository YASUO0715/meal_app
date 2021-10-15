<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        $this->call(CategorySeeder::class);
        $this->call(likeSeeder::class);
        $this->call(PostSeeder::class);
        \App\Models\Post::factory(5)->create();
    }
}
