<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\DB;
use App\Helpers;

class ScoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Score::create($request->all());

        // return 'Registry created!';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $score = Score::findOrFail($id);
        $score->update($request->all());

        return response('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $score = Score::findOrFail($id);
        $score->delete();

        return response('Deleted!');
    }

    public function leaderboard($game_id)
    {
        if (is_sqlinjection('id', 'integer', $game_id)) {
            return abort(404);
        }

        $leaderboard = DB::table('scores')
            ->join('users', 'users.id', '=', 'scores.user_id')
            ->join('games', 'games.id', '=', 'scores.game_id')
            ->select('users.id', 'users.name', 'scores.score')
            ->whereRaw('games.id = ?', $game_id)
            ->get();

            return $leaderboard; 
    }

    public function playerScore($game_id, $user_id)
    {
        if (is_sqlinjection('id', 'integer', $game_id)) {
            return abort(404);
        }

        if (is_sqlinjection('id', 'integer', $user_id)) {
            return abort(404);
        }

        $score = DB::table('scores')
            ->join('users', 'users.id', '=', 'scores.user_id')
            ->join('games', 'games.id', '=', 'scores.game_id')
            ->select('users.id', 'users.name', 'scores.score')
            ->whereRaw('games.id = ? and users.id = ?', [$game_id, $user_id])
            ->andWhere()
            ->get();

            return $score;
    }
}
