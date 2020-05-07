<?php

namespace App\Http\Controllers;

use App\Team;
use App\Match;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $teams = new Team();
       //getting logo details and moving to uploads folder
       $imageName = 'Teams_'.time().'.'.request()->logo->getClientOriginalExtension();
       request()->logo->move(public_path('uploads'), $imageName);

        //Getting all request data
       $teams->name = $request->input('name');
       $teams->club_state = $request->input('club_state');
       $teams->logo = $imageName;
       $teams->save();

        return back()

            ->with('success','Team Added successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    public function getpoint(Request $request)
    { 
        $id = $request->input('id');
        $match = Match::where('is_win',$id)->get();
        $matchcount = $match->count();
        $points = $matchcount * 2;
        return view('teams.getpoint',compact('matchcount','points'));
    }
}
