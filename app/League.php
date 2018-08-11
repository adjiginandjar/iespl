<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'sone_esports_league';


    public function games()
    {
        return $this->belongsToMany('App\Game', 'sone_esports_league_games');
    }
    public function teams()
    {
        return $this->belongsToMany('App\Team', 'sone_esports_league_teams');
    }
    public function matches()
    {
        return $this->hasMany('App\Match');
    }
    public static function getActiveLeague(){
        $activeLeague = League::where('active',true)->first();
        return $activeLeague;
    }
}
