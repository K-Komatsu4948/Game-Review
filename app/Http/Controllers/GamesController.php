<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;

use App\WeeklyRankingu;

use App\MonthlyRankingu;

use App\YearlyRankingu;


class GamesController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            
            $user = \Auth::user();
            
            $weeklyrankingus = WeeklyRankingu::take(5)->latest()->get();
            
            $data = [ 'weekly' => $weeklyrankingus];
        }
        
        
         return view('welcome', $data);
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
        
        
        $request->user()->games()->create([
            'content' => $request->content,
            'name' => $request->name,
        ]);
        
        
        return back();
    }
    
    public function destroy($id)
    {
        
        $game = \App\Game::findOrFail($id);
        
        
        if (\Auth::id() === $game->user_id) {
            $game->delete();
        }
        
        // 前のURLへリダイレクトさせる
        return back();
    }
}
