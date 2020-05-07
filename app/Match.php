<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function getteamname($id)
    {
    	$post = Team::find($id);
    	return $post;
    }
}
