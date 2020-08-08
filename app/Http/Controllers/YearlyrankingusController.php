<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Game;

use App\Review;
 
use App\WeeklyRankingu;

use App\MonthlyRankingu;

use App\YearlyRankingu;

class YearlyrankingusController extends Controller
{
    public function yearly()
    {
        
        $list = \DB::table('reviews')
        ->selectRaw('game_id, AVG(score) AS avg')
        ->groupBy('game_id')
        ->where('created_at', '>=', '2020-08-02 00:00:00')
        ->where('created_at', '<', '2021-08-09 00:00:00')
        ->orderByRaw('AVG(score)')
        ->take(10)
        ->get();
            
         $data = [];
        if (\Auth::check()) {
            
            $user = User::orderBy('id', 'desc')->paginate(10);
            
            $rankingus = Review::orderBy('id', 'desc')->paginate(10);
            
            
            $data = [
                'user' => $user,
                'yearly' => $rankingus,
            ];
        }
        return view('games.yearly_rankingu', $data);
    }
}
