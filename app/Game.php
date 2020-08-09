<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
     'name', 'register_content',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function hasReview($game_id) {
        return $this->reviews()->where('game_id', $game_id)->exists();
    }
    
    public function avgScore() {
    return $this->reviews()
        ->where('created_at', '>=', '2020-08-03 00:00:00')
        ->where('created_at', '<', '2020-08-010 00:00:00')
       ->get()->avg('score');
    }
    
    public function latest_reviews() {
    return $this->reviews()
        ->where('created_at', '>=', '2020-08-03 00:00:00')
        ->where('created_at', '<', '2020-08-010 00:00:00')
        ->orderBy('created_at', 'desc')
        ->first();
    }




}
