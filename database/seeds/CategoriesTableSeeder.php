<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Matching',
            'name_ja' => 'マッチング',
            'image' => 'category_matching.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Board',
            'name_ja' => '掲示板',
            'image' => 'category_boards.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'SNS',
            'name_ja' => 'SNS',
            'image' => 'category_sns.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Sharing',
            'name_ja' => 'シェアリング',
            'image' => 'category_sharing.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'EC-Site',
            'name_ja' => 'ECサイト',
            'image' => 'category_delivery.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Transmission',
            'name_ja' => '情報発信',
            'image' => 'category_media.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'esports',
            'name_ja' => 'eスポーツ',
            'image' => 'category_gaming.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Education',
            'name_ja' => '教育',
            'image' => 'category_education.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Other',
            'name_ja' => 'その他',
            'image' => 'category_others.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
