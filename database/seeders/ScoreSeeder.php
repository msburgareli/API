<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ScoreSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert([
            'user_id' =>rand(1,10),
            'game_id' =>rand(1,2),
            'tournament_id' => 1,
            'score' => rand(0,100)
        ]);
    }
}
