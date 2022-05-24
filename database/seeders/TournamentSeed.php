<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TournamentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "game_id" => rand(1,2),
            "name" => "Test Tournament".rand(1,2),
            "started_at" => now(),
            "ended_at" => now()->add(2)
        ]);
    }
}
