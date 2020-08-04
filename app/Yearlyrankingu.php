<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yearlyrankingu extends Model
{
    protected $fillable = [
     'score', 'game_id','content',
    ];
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
