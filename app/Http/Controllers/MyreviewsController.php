<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Game;

class MyreviewsController extends Controller
{
    public function index($id)
    {
        $data = [];
        if (\Auth::check()) { 
            
            $user = User::findOrFail($id);
            
            $games = $user->games()->orderBy('created_at', 'desc')->paginate(10);
            
            $reviews = $user->reviews()->orderBy('created_at', 'desc')->paginate(100);
            
            $data = [
                'user' => $user,
                'reviews' => $reviews,
                'games' => $games,
            ];
        }
        //dd('aaa');
        
        
        return view('reviews.review', [
            'user' => $user,
            'reviews'=>$reviews,
            'games'=>$games,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }
}
