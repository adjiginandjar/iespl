<?php namespace App\Classes;

use App\Team;
use App\Player;
use App\Match;
use App\League;
use DB;
use Carbon\Carbon;
use Log;

class Helper
{
    /**
*    Yamisok Plugin
*/

    public function syncYamisokData()
    {
    }

    public function syncYamisokDataTeams()
    {
        $responseTeams = $this->loadApiYamisok('http://api.iespl.yamisok.com/api/v1/get-teams');

        foreach ($responseTeams["data"] as $team) {
            $existTeam = Team::where('name', $team["team_name"])->first();
            if (!$existTeam) {
                $teamId= Db::table('sone_esports_team')->insertGetId([
                    'name' => $team['team_name'],
                    'url'=> uniqid(),
                    'image' => $team['avatar'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            } else {
                $teamId = $existTeam->id;
            }
            // TO-DO input player
            $responsePlayer = $this->loadApiYamisok('http://api.iespl.yamisok.com/api/v1/get-team/'.$team["id"]);
            foreach ($responsePlayer["data"]["members"] as $player) {
                $existPlayer = Player::where('yamisok_id', $player['member_id'])->first();
                if (!$existPlayer) {
                    $playerId = Db::table('sone_esports_player')->insertGetId([
              'team_id' => $teamId,
              'game_id' => $team["game_id"],
              'url'=> uniqid(),
              'name' => $player['member_name'],
              'nick' => $team["game_id"]== 1 || $team["game_id"] == 2 ? $player['member_name'] :$player['member_in_game_id'],
              'country' => $player['member_nationality'],
              'leader' => $player['is_captain'],
              'birth_date' => $player['member_birth_date'],
              'image' => $player['member_avatar'],
              'yamisok_id' => $player['member_id'],
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ]);
                } else {
                    $playerId = Db::table('sone_esports_player')->where('yamisok_id', $existPlayer->yamisok_id)->update([
            'team_id' => $teamId,
            'game_id' => $team["game_id"],
            'name' => $player['member_name'],
            'nick' => $team["game_id"]== 1 || $team["game_id"] == 2 ? $player['member_name'] :$player['member_in_game_id'],
            'country' => $player['member_nationality'],
            'leader' => $player['is_captain'],
            'birth_date' => $player['member_birth_date'],
            'yamisok_id' => $player['member_id'],
            'image' => $player['member_avatar'],
            'updated_at' => Carbon::now()
          ]);
                }
            }
        }
    }
    public function syncYamisokDataMember()
    {
    }
    public function syncYamisokDataMatch()
    {
        // $league = League::ActiveLeague()->first();
        $responseMatch = $this->loadApiYamisok('http://api.iespl.yamisok.com/api/v1/get-tournament-matches/week/2');
        foreach ($responseMatch["data"] as $games) {
            $tournament =$games["tournaments"];
            foreach ($tournament[0]["tournament_matches"] as $matches) {
                $existMatch = Match::where('yamisok_id', $matches['tournament_match_id'])->first();
                $home = Team::where('name', $matches["tournament_match_team1"]["team_name"])->first();
                $away = Team::where('name', $matches["tournament_match_team2"]["team_name"])->first();
                if (!$existMatch) {
                    $match = Db::table('sone_esports_match')->insertGetId([
                  'url'=> uniqid(),
                  'league_id' => 1, //force for one league
                  'game_id' => $games["game_id"],
                  'home_team_id' => $home->id,
                  'away_team_id' => $away->id,
                  'home_score' => $matches["tournament_match_score_team1"] ,
                  'away_score' => $matches["tournament_match_score_team2"] ,
                  'kick_off' => $matches["tournament_match_start_time"] ,
                  'live' => $matches["tournament_match_status"] == 'Live' ? true:false,
                  'yamisok_id'=>$matches['tournament_match_id']

                ]);
                } else {
                    $match = Db::table('sone_esports_match')->where('yamisok_id', $existMatch->yamisok_id)->update([
                'league_id' => 1,
                'game_id' => $games["game_id"],
                'home_team_id' => $home->id,
                'away_team_id' => $away->id,
                'home_score' => $matches["tournament_match_score_team1"] ,
                'away_score' => $matches["tournament_match_score_team2"] ,
                'kick_off' => $matches["tournament_match_start_time"] ,
                'live' => $matches["tournament_match_status"] == 'Live' ? true:false

              ]);
                }
            }
        }
    }
    public function loadApiYamisok($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        curl_setopt($curl, CURLOPT_ENCODING, '');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // no echo, just return result
        if (!ini_get('open_basedir')) {
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // sometime is useful :)
        }
        return json_decode(curl_exec($curl), true);
    }
}
