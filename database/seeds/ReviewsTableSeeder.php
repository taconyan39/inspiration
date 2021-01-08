<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::tables('user_reviews')->insert([
            'review' => 'よもやよもやだ',
            'rating' => 3,
            'idea_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::tables('user_reviews')->insert([
            'review' => 'よもやよもやだ',
            'rating' => 2,
            'idea_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::tables('user_reviews')->insert([
            'review' => 'よもやよもやだ',
            'rating' => 1,
            'idea_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
