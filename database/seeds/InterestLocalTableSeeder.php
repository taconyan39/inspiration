<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InterestLocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interests')->insert([

            'user_id' => 1,
            'idea_id' => 1,
              
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('interests')->insert([

            'user_id' => 2,
            'idea_id' => 1,
              
             
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('interests')->insert([

            'user_id' => 3,
            'idea_id' => 1,
              
             
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('interests')->insert([

            'user_id' => 1,
            'idea_id' => 2,
              
             
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('interests')->insert([

            'user_id' => 2,
            'idea_id' => 2,
              
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('interests')->insert([

            'user_id' => 3,
            'idea_id' => 2,
              
             
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('interests')->insert([

            'user_id' => 1,
            'idea_id' => 3,
              
             
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('interests')->insert([

            'user_id' => 2,
            'idea_id' => 3,
              
             
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('interests')->insert([

            'user_id' => 3,
            'idea_id' => 3,
              
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
