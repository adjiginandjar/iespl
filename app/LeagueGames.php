<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\League;
use App\Game;
use Illuminate\Support\Facades\Log;

class LeagueGames extends Model
{
  protected $table = 'sone_esports_league_games';

  public function games()
  {
      return $this->belongsTo('App\Game');
  }
  public function league()
  {
      return $this->belongsTo('App\League');
  }


}
