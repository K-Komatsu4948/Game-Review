<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
     'name', 'content',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
