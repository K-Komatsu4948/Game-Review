<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Game;

use App\Review;

use App\WeeklyRankingu;

use App\MonthlyRankingu;

use App\YearlyRankingu;

class MonthlyrankingusController extends Controller
{
    public function monthly()
    {
        $games = Game::all();
        
        $data = [];
        if (\Auth::check()) { 
            $user = User::orderBy('id', 'desc')->paginate(10);
            
            $games = Game::paginate(10);
            
            
            $data = [
                'user' => $user,
                'games' => $games,
                
            ];
        }
        return view('games.monthly_rankingu', $data);
    }
}
