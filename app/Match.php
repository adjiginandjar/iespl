<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes\Helper;
use App\League;

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

    public function matchStatus(){
        if(!empty($this->home_score) || !empty($this->away_score)){
            return 'played';
        }elseif($this->live == '0'){
            return 'date';
        }elseif($this->live == '1'){
            return 'live';
        }
    }

    public function showMatchWeek(){
        $helper = new Helper;

        $match = ($helper->datediff('ww', $this->league->start_date, $this->kick_off)+1);
        $match = $match<=0?1:$match;

        return $match;
    }

    public function getMatchWeek(){
        $helper = new Helper;

        $match = ($helper->datediff('ww', $this->league->start_date, date("Y-m-d"))+1);
        $match = $match<=0?1:$match;
        // print_r($match);
        // exit();
        return $match;
    }

    public function scopeMatchWeek($query, $match=null){
        $helper = new Helper;

        $league = League::getActiveLeague()->first();
        if($league){
            if(!$match){
                $match = ($helper->datediff('ww', $league->start_date, date("Y-m-d"))+1);
                $match = $match<=0?1:$match;
            }
            $arrWeeks = $league->getAllWeekDate();
            if(isset($arrWeeks[$match])){
                list($start_date, $end_date) = array_values($arrWeeks[$match]);
                $query->where('kick_off', '>=', $start_date)
                    ->where('kick_off', '<=', $end_date)
                    ->orderBy('kick_off', 'asc');

                return $query;
            }
        }

        return $query;
    }
}
