<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'sone_esports_game';

    public function leagueGames()
    {
        return $this->hasMany('App\LeagueGames');
    }
}
