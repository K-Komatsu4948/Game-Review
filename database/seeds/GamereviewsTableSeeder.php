<?php

use Illuminate\Database\Seeder;

class GamereviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => '1',
            'game_id' => '1',
            'content' => 'test content 1',
            'score' => '2'
        ]);
    }
}
