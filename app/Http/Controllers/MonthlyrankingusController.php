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
        $list = \DB::table('reviews')
        ->selectRaw('game_id, SUM(score) AS sum')
        ->groupBy('game_id')
        ->where('created_at', '>=', '2020-08-02 00:00:00')
        ->where('created_at', '<', '2020-09-02 00:00:00')
        ->orderByRaw('SUM(score)')
        ->take(10)
        ->get();
        
        $data = [];
        if (\Auth::check()) { 
            $user = User::orderBy('id', 'desc')->paginate(10);
            
            $rankingus = Review::orderBy('id', 'desc')->paginate(10);
            
            
            $data = [
                'user' => $user,
                'monthly' => $rankingus,
            ];
        }
         return view('games.monthly_rankingu', $data);
    }
}
