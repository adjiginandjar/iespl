<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'sone_esports_game';

    public function leagues()
    {
        return $this->belongsToMany('App\League', 'sone_esports_league_games');
    }
}
