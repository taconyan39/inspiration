<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 6; $i++){

            $r = mt_rand(1, 5);
            DB::table('reviews')->insert([
                'review' => '米農家をしています。今年は35haほど田んぼの管理をしました。
    
                このゲームが発売されてから、周りの友人達から攻略サイト代わりに使われ、連絡が頻発しています。
                私はあなた達の農林水産省ではありません。プライベートで業務的な質問をして自由を奪うのはやめてください。',
                'rating' => $r,
                'idea_id' => $i * 10 + 1,
                'user_id' => 1,
                'created_at' => Carbon::createFromDate(2020, $r, $i),
                'updated_at' => Carbon::now(),
            ]);
        }
        for($i = 1;$i <= 6; $i++){
    
            $r = mt_rand(2, 5);
            $u = mt_rand(2, 7);
            $o = mt_rand(1,5);
    
            DB::table('reviews')->insert([
                'review' => 'すでにネット上で話題になっていますが、稲作パートが超本格的です。
                しっかり作り込んであるので、こちらもしっかりと米作りを学んで挑みましょう。しかし、だからと言って理不尽だったりイライラしたりする事はありません。
                奥深い稲作の世界を体験しましょう。',
                'rating' => $r,
                'idea_id' => $o  * 10 + 1,
                'user_id' => $u *10 + 1,
                'created_at' => Carbon::createFromDate(2020, $r, $u),
                'updated_at' => Carbon::now(),
            ]);
        }
        for($i = 1;$i <= 100; $i++){
    
            $r = mt_rand(3, 5);
            $u = mt_rand(2, 7);
    
            DB::table('reviews')->insert([
                'review' => 'すでにネット上で話題になっていますが、稲作パートが超本格的です。
                しっかり作り込んであるので、こちらもしっかりと米作りを学んで挑みましょう。しかし、だからと言って理不尽だったりイライラしたりする事はありません。
                奥深い稲作の世界を体験しましょう。',
                'rating' => $r,
                'idea_id' => $o,
                'user_id' => $u  * 10 + 1,
                'created_at' => Carbon::createFromDate(2020, $r, $u),
                'updated_at' => Carbon::now(),
            ]);
        }
    
        for($i = 1;$i <= 10; $i++){
    
            $r = mt_rand(4, 5);
            $u = mt_rand(2, 7);
    
            DB::table('reviews')->insert([
                'review' => 'すでにネット上で話題になっていますが、稲作パートが超本格的です。
                しっかり作り込んであるので、こちらもしっかりと米作りを学んで挑みましょう。しかし、だからと言って理不尽だったりイライラしたりする事はありません。
                奥深い稲作の世界を体験しましょう。',
                'rating' => $r,
                'idea_id' => $o,
                'user_id' => $u  + 1,
                'created_at' => Carbon::createFromDate(2020, $r, $u),
                'updated_at' => Carbon::now(),
            ]);
        }
            
        }
}
