<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $matches = new Match();
        $allMatch = $matches->all();
        foreach($allMatch as $win_match)
        {
            $matchlist['team1'] = $matches->getteamname($win_match['team1_id'])['name'];

            $matchlist['team2'] = $matches->getteamname($win_match['team2_id'])['name'];

            $matchlist['winner'] = $matches->getteamname($win_match['is_win'])['name'];

            $matchNewList[] = $matchlist;
        }

        //$matchnewlists = $matchNewList;
        return view('matches.index',compact('teams','matchNewList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $match = new Match();
        $match->team1_id = $request->input('team1Id');
        $match->team2_id = $request->input('team2Id');
        $match->is_win = $request->input('team');
        $match->save();

        return back()

            ->with('success','Winner Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
