<?php

namespace App\Http\Controllers;


use App\Player;
use App\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input('team_id')){
            $key = $request->input('team_id');
            $teams = Team::find($key);
            $teamname = $teams->name;
            $players = Player::where('team_id',$teams->id)->get();
            return view('players.index', compact('players','teamname'));
        }
        return redirect()->action('TeamController@index')
        ->with('error','Team should be select to Create a Player');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->input('team_id')){
            $key = $request->input('team_id');
            $teams = Team::find($key);
            
            return view('players.create', compact('teams'));
        }
        return redirect()->action('TeamController@index')
        ->with('error','Team should be select to Create a Player');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player = new Player();
       //getting logo details and moving to uploads folder
       $imageName = 'Player_'.time().'.'.request()->logo->getClientOriginalExtension();
       request()->logo->move(public_path('uploads'), $imageName);

        //Getting all request data
       $player->firstname = $request->input('firstname');
       $player->lastname = $request->input('lastname');
       $player->jersey_number = $request->input('jersey_number');
       $player->img = $imageName;
       $player->country = $request->input('country');
       $player->team_id = $request->input('team_id');
       $player->save();

        return back()

            ->with('success','Player Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
