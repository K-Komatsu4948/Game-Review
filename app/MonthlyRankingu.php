<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyRankingu extends Model
{
    protected $fillable = [
     'score', 'game_id','content',
    ];
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function avgScore() {
    return $this->reviews()
        ->where('created_at', '>=', '2020-08-03 00:00:00')
        ->where('created_at', '<', '2020-09-03 00:00:00')
       ->get()->avg('score');
    }
    
    public function latest_reviews() {
    return $this->reviews()
        ->where('created_at', '>=', '2020-08-03 00:00:00')
        ->where('created_at', '<', '2020-09-03 00:00:00')
        ->orderBy('created_at', 'desc')
        ->first();
    }
}
