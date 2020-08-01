<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
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
        return view('users.show');
    }
    public function store(Request $request)
    {
        $request->validate([
            'score' => 'required|max:255',
        ]);
        $request->user()->reviews()->create([
            'score' => $request->score,
        ]);
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
    public function weekly_rankingus($id)
    {
        $review = Review::findOrFail($id);
        $review->loadRelationshipCounts();
        $weekly_rankingus = $review->weekly_rankingus()->paginate(100);
        return view('games.rankingu', [
            'user' => $user,
            'review' => $review,
        ]);
    }
    public function monthly_rankingus($id)
    {
        $review = Review::findOrFail($id);
        $review->loadRelationshipCounts();
        $monthly_rankingus = $review->monthly_rankingus()->paginate(100);
        return view('games.rankingu', [
            'user' => $user,
            'review' => $review,
        ]);
    }
    public function yearly_rankingus($id)
    {
        $review = Review::findOrFail($id);
        $review->loadRelationshipCounts();
        $yearly_rankingus = $review->yearly_rankingus()->paginate(100);
        return view('games.rankingu', [
            'user' => $user,
            'review' => $review,
        ]);
    }
}
