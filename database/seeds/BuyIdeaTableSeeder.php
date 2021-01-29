<?php

use Illuminate\Database\Seeder;

class BuyIdeaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 201; $i <= 300; $i+ 10){
            DB::table('interests')->insert([

                'user_id' => 1,
                'idea_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        for($i = 11; $i <= 80; $i+ 10){
            
            for($x = 10; $i <= 60; $i+ 10){
            DB::table('interests')->insert([
                'user_id' => $i,
                'idea_id' => $x + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
