<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Game;

use App\Review;

use App\Weeklyrankingu;

use App\Monthlyranking;

use App\Yearlyranking;

class RankingusController extends Controller
{
    public function weekly()
    {
        
        $data = [];
        if (\Auth::check()) {
            
            $weeklyrankings = Weeklyrankingu::take(5)->latest()->get();
            
            $data = [ 'weekly' => $weeklyrankings];
        }
        
        
         return view('welcome', $data);
    }
}
