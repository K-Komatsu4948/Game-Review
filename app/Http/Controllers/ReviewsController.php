<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Game;

use App\Review;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $data = [];
        if (\Auth::check()) { 
            $user = \Auth::user();
            $games = $user->games()->orderBy('created_at', 'desc')->paginate(10);
            $reviews = $user->reviews()->orderBy('created_at', 'desc')->paginate(100);
            $data = [
                'user' => $user,
                'reviews' => $reviews,
                'games' => $games,
                
            ];
        }
        return view('users.show', $data);
    }
    
    
    public function create($id)
    {
        $review = new Review;
        
        $game = Game::findOrFail($id);
        
        return view('reviews.score', [
            'review' => $review,
            'game' => $game,
        ]);
    }
    
    public function store(Request $request)
    {   
        $request->validate([
            'score' => 'required|max:255',
        ]);
        
        $review = new Review;
        $review->score = $request->score;
        $review->game_id = $request->game_id;
        $review->save();
        
        return back();
    }
    public function destroy($id)
    {
        $review = \App\User::findOrFail($id);
        if (\Auth::id() === $review->user_id) {
            $review->delete();
        }
        return back();
    }
}
