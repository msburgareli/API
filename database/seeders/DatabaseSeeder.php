<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory(1)->create();
        \App\Models\Game::factory(2)->create();
        \App\Models\Tournament::factory(2)->create();
        \App\Models\Score::factory(10)->create();
    }
}
