<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Classes\Helper;
use Log;

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
    // public static function scopeActiveLeague(){
    //     $activeLeague = League::where('active',true)
    //                           ->where('start_date', '<=', $now)
    //                           ->('end_date', '>=', $now)->first();
    //
    //     return $activeLeague;
    // }
    public function scopeActiveLeague($query){
        // $now = '2018-06-26';;
        $now = Carbon::now();
        $result = $query->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now);

        if(!$result->first()){
            return self::where('start_date', '>=', $now)
                ->where('end_date', '>=', $now)
                ->orderBy('start_date', 'asc');
        }

        return $result;
    }

    public function getStanding($gameNick=null){
        if(!$gameNick)
            return [];

        $helper = new Helper;
        $standing = [];
        foreach ($this->teams as $team) {
            $matches = $this->matches()
                ->whereHas('game', function($query) use($gameNick){
                    $query->where('nick', $gameNick);
                })

                ->where(function($query)use($team){
                    $query->where('home_team_id', $team->id)
                    ->orWhere('away_team_id', $team->id);
                })
                ->get();

            $data = [
                'play'  => 0,
                'win'   => 0,
                'draw'  => 0,
                'lose'  => 0,
                'point' => 0,
            ];
            foreach ($matches as $match) {
                if(empty($match->home_score) && empty($match->away_score))
                    continue;

                $status = '';
                if($match->home_team_id == $team->id){ // left side
                    $status = $this->checkScore($match->home_score, $match->away_score);
                }elseif($match->away_team_id == $team->id){ //  right side
                    $status = $this->checkScore($match->away_score, $match->home_score);
                }

                switch ($status) {
                    case 'win':
                        $data['win'] += 1;
                        $data['point'] += 3;
                        $data['play'] += 1;
                        break;
                    case 'draw':
                        $data['draw'] += 1;
                        $data['point'] += 1;
                        $data['play'] += 1;
                        break;
                    case 'lose':
                        $data['lose'] += 1;
                        $data['point'] += 0;
                        $data['play'] += 1;
                        break;
                    default:
                        break;
                }
            }

            $standing[$team->id]['info'] = $data;
            $standing[$team->id]['team'] = $team;
        }

        uasort($standing, function($a, $b) {
            return $b['info']['point'] <=> $a['info']['point'];
        });

        $counter = 1;
        foreach ($standing as $key => $value) {
            $standing[$key]['info']['pos'] = $helper->ordinal($counter, true);
            $counter++;
        }
        // print_r($standing);
        // exit();
        return $standing;
    }

    private function checkScore($score1=0, $score2=0){
        if($score1 > $score2){
            return 'win';
        }elseif($score1 == $score2){
            return 'draw';
        }elseif($score1 < $score2){
            return 'lose';
        }
    }

    public function getMatchWeek(){
        $helper = new Helper;
        // $matches = $this->matches();

        $match = ($helper->datediff('ww', $this->start_date, date("Y-m-d"))+1);
        $match = $match<=0?1:$match;

        return $match;
    }

    // public function getAllMatchWeek(){
    //     $helper = new Helper;

    //     $match = ($helper->datediff('ww', $this->start_date, date("Y-m-d"))+1);
    //     $match = $match<=0?1:$match;

    //     return $match;
    // }

    public function dateDiff($type='ww'){
        $helper = new Helper;

        return $helper->datediff($type, $this->start_date, $this->end_date);
    }

    public function getAllWeekDate(){
        $begin = new DateTime($this->start_date);
        $end = new DateTime($this->end_date);
        $interval = new DateInterval('P1W');
        $daterange = new DatePeriod($begin, $interval, $end);


        $dates = [];
        foreach($daterange as $key => $date) {
            $dates[$key+1] = array(
                'start' => $date->format('Y-m-d'),
                'end' => $date->modify('+6 days')->format('Y-m-d'),
            );
        }

        return $dates;
    }

    public function getGameMatch(){
        $data = [];
        foreach ($this->games as $game) {
            $data[$game->id]['game'] = $game;
            $currentWeek = $this->getMatchWeek();

            // print_r($currentWeek);
            // exit();
            $allWeek = $this->getAllWeekDate();
            // echo "<pre>";
            // print_r($allWeek);
            // exit();
            foreach ($allWeek as $key => $value) {
                // if($key > $currentWeek)
                //     break;

                $matches = $this->matches()
                    ->FilterByGame([$game->id])
                    ->MatchWeek($key)->get();
                $data[$game->id]['matches'][$key] = $matches;
            }
        }

        // echo "<pre>";
        // print_r($data);
        // exit();

        return $data;
    }
}
