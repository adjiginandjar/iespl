<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\League;
use Log;

class WebController extends Controller
{
    public function index()
    {
        $league = League::getActiveLeague();
        $games = $league->games()->get();
        $matches = $league->matches()->get();

        return  view('pages.home',compact('games','matches'));
    }
}
