<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
 
use App\WeeklyRankingu;

use App\MonthlyRankingu;

use App\YearlyRankingu;

class YearlyrankingusController extends Controller
{
    public function yearly()
    {
         $data = [];
        if (\Auth::check()) {
            
            $yearlyrankingus = YearlyRankingu::take(5)->latest()->get();
            
            $data = [ 'yearly' => $yearlyrankingus];
        }
        return view('games.yearly_rankingu', $data);
    }
}
