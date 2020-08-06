<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Game;

use App\Review;

use App\WeeklyRankingu;

use App\MonthlyRankingu;

use App\YearlyRankingu;


class GamesController extends Controller
{
    public function index()
    {
        $list = \DB::table('reviews')
        ->selectRaw('game_id, SUM(score) AS sum')
        ->groupBy('game_id')
        ->where('created_at', '>=', '2020-08-02 00:00:00')
        ->where('created_at', '<', '2020-08-09 00:00:00')
        ->orderByRaw('SUM(score)')
        ->take(10)
        ->get();
        $data = [];
        if (\Auth::check()) { 
            $user = User::orderBy('id', 'desc')->paginate(10);
            
            $rankingus = Review::orderBy('id', 'desc')->paginate(10);
            
            
            $data = [
                'user' => $user,
                'weekly' => $rankingus,
            ];
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
        
        return back();
    }
}
