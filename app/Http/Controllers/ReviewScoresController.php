<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Game;

use App\Review;

class ReviewScoresController extends Controller
{   
    public function show()
    {
        $review = new Review;
        
        
        return view('reviews.score', [
            'review' => $review,
            
            
        ]);
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
            'score' => 'required',
        ]);
        //dd($request);
        $game_id = $request->game_id;
        $review = new Review;
        $review->user_id = $request->user()->id;
        $review->game_id = $request->game()->id;
        $review->content = $request->content;
        $review->score = $request->score;
        $reviews->save();
        
        return redirect('/');
    }
}
