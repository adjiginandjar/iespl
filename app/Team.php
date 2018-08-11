<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'sone_esports_team';

    public function teams()
    {
        return $this->belongsToMany('App\League', 'sone_esports_league_teams');
    }
}
