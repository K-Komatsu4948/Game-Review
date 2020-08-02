<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;


class GamesController extends Controller
{
    public function index()
    {   
        $games = Game::all();
        
         $data = [];
        if (\Auth::check()) {
            
            $user = \Auth::user();
            
            $weekly = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);
            
            $monthly = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);
             
            $yearly = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [ 'weekly' => $weekly, 'monthly' => $monthly,  'yearly' => $yearly];
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
