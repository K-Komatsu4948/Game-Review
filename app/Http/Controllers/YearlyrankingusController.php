<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;

use App\Weeklyrankingu;

use App\Monthlyranking;

use App\Yearlyranking;

class YearlyrankingusController extends Controller
{
    public function yearly()
    {
         $data = [];
        if (\Auth::check()) {
            
            $yearlyrankings = Yearlyrankingu::take(5)->latest()->get();
            
            $data = [ 'yearly' => $yearlyrankings];
        }
        return view('games.yearly.rankingu', $data);
    }
}
