<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;

use App\Weeklyrankingu;

use App\Monthlyranking;

use App\Yearlyranking;

class MonthlyrankingusController extends Controller
{
    public function monthly()
    {
        $data = [];
        if (\Auth::check()) {
            
            $monthlyrankings = Monthlyrankingu::take(5)->latest()->get();
            
            $data = [ 'monthly' => $monthlyrankings];
        }
         return view('games.monthly.rankingu', $data);
    }
}
