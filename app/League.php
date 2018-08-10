<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'sone_esports_league';


    public function leagueGames()
    {
        return $this->hasMany('App\LeagueGames');
    }
}
