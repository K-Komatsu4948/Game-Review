<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingusController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            
            $user = \Auth::user();
            
            $weekly = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);
            
            $monthly = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);
             
            $yearly = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);
            
        $data = [ 'weekly' => $weekly, 'monthly' => $monthly,  'yearly' => $yearly];
        }
        
         return view('games.rankingu', $data);
    }
}
