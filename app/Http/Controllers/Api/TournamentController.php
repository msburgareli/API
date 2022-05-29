<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tournament::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tournament::create($request->all());

        return 'tournament created';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tournament::findOrFail($id);
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
        $tournament = Tournament::findOrFail($id);
        $tournament->update($request->all());

        return response('tournament updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();

        return response('tournament deleted');
    }

    public function leaderboard($tournament_id)
    {
        if (is_sqlinjection('id', 'integer', $tournament_id)) {
            return abort(404);
        }

        $leaderboard = DB::table('scores')
            ->join('users', 'users.id', '=', 'scores.user_id')
            ->select('users.id', 'users.name', 'scores.score')
            ->whereRaw('scores.tournament_id = ?', $tournament_id)
            ->orderBy('scores.score', 'DESC')
            ->get();

            return response()->json($leaderboard);
    }
}
