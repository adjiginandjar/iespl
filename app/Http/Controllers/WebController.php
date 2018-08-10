<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\LeagueGames;

class WebController extends Controller
{
    public function index()
    {
    $games = LeagueGames::getGamesInThisLeague();
    return  view('pages.home',compact('games'));
    }
}
