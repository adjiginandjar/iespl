<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\League;
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

  public static function getGamesInThisLeague(){
      $activeLeague = League::where('active',true)->first();
      $games = LeagueGames::where('league_id',$activeLeague->id)->get();
      Log::info($games->games());
      return $games;

  }
}
