<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BuyIdeaLocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 20; $i <= 30; $i++){
            DB::table('buy_ideas')->insert([

                'user_id' => 1,
                'idea_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        for($i = 2; $i <= 8; $i++){
            
            for($x = 1; $i <= 6; $i++){
            DB::table('buy_ideas')->insert([
                'user_id' => $i,
                'idea_id' => $x + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
