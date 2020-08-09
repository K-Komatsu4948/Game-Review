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
        $games = Game::all();

        
        $data = [];
        if (\Auth::check()) { 
            $user = User::orderBy('id', 'desc')->paginate(10);
            
            $games = Game::paginate(10);
            
            
            $data = [
                'user' => $user,
                'games' => $games,
                
            ];
        }
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'register_content' => 'required|max:255',
        ]);
        
        
        $request->user()->games()->create([
            'register_content' => $request->register_content,
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
