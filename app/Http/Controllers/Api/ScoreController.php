<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\DB;

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
        Score::create($request->all());

        return response('score created');
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

        return response('score updated');
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

        return response('score deleted');
    }

    public function playerScore(Request $request)
    {
        if (is_sqlinjection('id', 'integer', $request->tournament_id) || is_sqlinjection('id', 'integer', $request->user_id)) {
            return abort(404);
        }

        $score = DB::table('scores')
            ->join('users', 'users.id', '=', 'scores.user_id')
            ->select('users.id', 'users.name', 'scores.score')
            ->whereRaw('scores.tournament_id = ? and scores.user_id = ?', [$request->tournament_id, $request->user_id])
            ->get();

            return response()->json($score);
    }
}
