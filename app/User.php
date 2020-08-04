<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function games()
    {
        return $this->hasMany(Game::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('games', 'reviews');
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function feed_reviews()
    {
        
        $userIds = $this->id;
        
        return REview::whereIn('user_id', $userIds);
    }
    
    public function game_register() 
    {
       
       $user = User::findOrFail($id);
       
       
       
       return view('games.game_register', [
            'user' => $user,
        ]);
    }
    
    public function game_search() 
    {
        $data = null;
        
        return view('games.search', [
        'game' => $game,
        ]);
    }
    
    public function weekly() 
    {
        $review = \App\Review::findOrFail($id);
        
        return view('games.rankingu', [
        'reviews' => $review,
        ]);
    }
    
    public function monthly() 
    {
        $review = \App\Review::findOrFail($id);
        
        return view('games.rankingu', [
        'reviews' => $reviews,
        ]);
    }
    
    public function yearly() 
    {
        $review = \App\Review::findOrFail($id);
        
        return view('games.rankingu', [
        'reviews' => $review,
        ]);
    }
}
