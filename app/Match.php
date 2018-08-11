<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'sone_esports_match';

    public function league()
    {
        return $this->belongsTo('App\League');
    }
    public function game()
    {
        return $this->belongsTo('App\Game');
    }
    public function homeTeam()
    {
        return $this->belongsTo('App\Team','home_team_id');
    }
    public function awayTeam()
    {
        return $this->belongsTo('App\Team','away_team_id');
    }
}
