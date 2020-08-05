<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;

use App\WeeklyRankingu;

use App\MonthlyRankingu;

use App\YearlyRankingu;

class MonthlyrankingusController extends Controller
{
    public function monthly()
    {
        $data = [];
        if (\Auth::check()) {
            
            $monthlyrankingus = MonthlyRankingu::take(5)->latest()->get();
            
            $data = [ 'monthly' => $monthlyrankingus];
        }
         return view('games.monthly_rankingu', $data);
    }
}
