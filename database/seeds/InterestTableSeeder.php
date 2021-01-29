<?php

use Illuminate\Database\Seeder;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 10; $i <= 20; $i++){
            DB::table('interests')->insert([

                'user_id' => 1,
                'idea_id' => $i * 10 + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        for($i = 2; $i <= 7; $i++){
            
            for($x = 1; $i <= 6; $i++){
            DB::table('interests')->insert([
                'user_id' => $i * 10 + 1,
                'idea_id' => $x * 10 + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }
        }
        
    }
}
