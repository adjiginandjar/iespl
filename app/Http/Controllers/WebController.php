<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\League;
use App\News;
use Log;

class WebController extends Controller
{
    public function index()
    {
        $league = League::activeLeague()->first();
        $games = $league->games()->get();
        $matches = $league->matches()->get();

        $news = News::all()->take(5);

        return  view('pages.home',compact('games','matches','news'));
    }
}
