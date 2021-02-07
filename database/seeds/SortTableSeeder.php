<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sorts')->insert(
            [
                'id' => 1,
                'name' => '投稿が新しい順',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        );
        DB::table('sorts')->insert(
            [
                'id' => 2,
                'name' => '投稿が古い順',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        );
        DB::table('sorts')->insert(
            [
                'id' => 3,
                'name' => '価格が高い順',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        );
        DB::table('sorts')->insert(
            [
                'id' => 4,
                'name' => '価格が安い順',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        );
            
    }
}
