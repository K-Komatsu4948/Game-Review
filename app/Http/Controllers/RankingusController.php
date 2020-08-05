<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Game;

use App\Review;

use App\WeeklyRankingu;

use App\MonthlyRankingu;

use App\YearlyRankingu;

class RankingusController extends Controller
{
    public function weekly()
    {
        
        $data = [];
        if (\Auth::check()) {
            
            $user = \Auth::user();
            
            $weeklyrankingus = WeeklyRankingu::take(5)->latest()->get();
            
            $data = [ 'weekly' => $weeklyrankingus];
        }
        
        
         return view('games.rankingu', $data);
    }
}
