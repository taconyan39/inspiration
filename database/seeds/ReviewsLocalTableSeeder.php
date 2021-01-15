<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewsLocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
        $rating_a = mt_rand(1,5);
        $rating_b = mt_rand(1,5);
        $rating_c = mt_rand(1,5);

        $idea_a = 1;
        $idea_b = mt_rand(1,5);
        $idea_c = mt_rand(1,5);
        $idea_d = mt_rand(1,10);
        $idea_e = mt_rand(1,10);

        $user_ = mt_rand(1,3);

        DB::table('reviews')->insert([
            'review' => '米農家をしています。今年は35haほど田んぼの管理をしました。

            このゲームが発売されてから、周りの友人達から攻略サイト代わりに使われ、連絡が頻発しています。
            私はあなた達の農林水産省ではありません。プライベートで業務的な質問をして自由を奪うのはやめてください。',
            'rating' => $rating_a,
            'idea_id' => $idea_a,
            'user_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'すでにネット上で話題になっていますが、稲作パートが超本格的です。
            しっかり作り込んであるので、こちらもしっかりと米作りを学んで挑みましょう。しかし、だからと言って理不尽だったりイライラしたりする事はありません。
            奥深い稲作の世界を体験しましょう。',
            'rating' => $rating_b,
            'idea_id' => $idea_c,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'PVを始めて見たときから注目していたソフトでしたが、待っていた甲斐がありました。
            一日じっくりやっていましたが、アクションとしてかなり完成度が高いです。
            操作感が抜群に良く、直感的に動かせるため、やっていて気持ちが良い。
            特に羽衣システムが絶妙で、回避に投げ技、移動など様々な場面で使えます',
            'rating' => $rating_c,
            'idea_id' => $idea_d,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => '米農家をしています。今年は35haほど田んぼの管理をしました。

            このゲームが発売されてから、周りの友人達から攻略サイト代わりに使われ、連絡が頻発しています。
            私はあなた達の農林水産省ではありません。プライベートで業務的な質問をして自由を奪うのはやめてください。',
            'rating' => $rating_a,
            'idea_id' => $idea_b,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'すでにネット上で話題になっていますが、稲作パートが超本格的です。
            しっかり作り込んであるので、こちらもしっかりと米作りを学んで挑みましょう。しかし、だからと言って理不尽だったりイライラしたりする事はありません。
            奥深い稲作の世界を体験しましょう。',
            'rating' => $rating_b,
            'idea_id' => $idea_a,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'PVを始めて見たときから注目していたソフトでしたが、待っていた甲斐がありました。
            一日じっくりやっていましたが、アクションとしてかなり完成度が高いです。
            操作感が抜群に良く、直感的に動かせるため、やっていて気持ちが良い。
            特に羽衣システムが絶妙で、回避に投げ技、移動など様々な場面で使えます',
            'rating' => $rating_c,
            'idea_id' => $idea_b,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => '米農家をしています。今年は35haほど田んぼの管理をしました。

            このゲームが発売されてから、周りの友人達から攻略サイト代わりに使われ、連絡が頻発しています。
            私はあなた達の農林水産省ではありません。プライベートで業務的な質問をして自由を奪うのはやめてください。',
            'rating' => $rating_a,
            'idea_id' => $idea_d,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'すでにネット上で話題になっていますが、稲作パートが超本格的です。
            しっかり作り込んであるので、こちらもしっかりと米作りを学んで挑みましょう。しかし、だからと言って理不尽だったりイライラしたりする事はありません。
            奥深い稲作の世界を体験しましょう。',
            'rating' => $rating_b,
            'idea_id' => $idea_b,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => '米農家をしています。今年は35haほど田んぼの管理をしました。

            このゲームが発売されてから、周りの友人達から攻略サイト代わりに使われ、連絡が頻発しています。
            私はあなた達の農林水産省ではありません。プライベートで業務的な質問をして自由を奪うのはやめてください。',
            'rating' => $rating_c,
            'idea_id' => $idea_a,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'すでにネット上で話題になっていますが、稲作パートが超本格的です。
            しっかり作り込んであるので、こちらもしっかりと米作りを学んで挑みましょう。しかし、だからと言って理不尽だったりイライラしたりする事はありません。
            奥深い稲作の世界を体験しましょう。',
            'rating' => $rating_a,
            'idea_id' => $idea_c,
            'user_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'PVを始めて見たときから注目していたソフトでしたが、待っていた甲斐がありました。
            一日じっくりやっていましたが、アクションとしてかなり完成度が高いです。
            操作感が抜群に良く、直感的に動かせるため、やっていて気持ちが良い。
            特に羽衣システムが絶妙で、回避に投げ技、移動など様々な場面で使えます',
            'rating' => $rating_b,
            'idea_id' => $idea_e,
            'user_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => '米農家をしています。今年は35haほど田んぼの管理をしました。

            このゲームが発売されてから、周りの友人達から攻略サイト代わりに使われ、連絡が頻発しています。
            私はあなた達の農林水産省ではありません。プライベートで業務的な質問をして自由を奪うのはやめてください。',
            'rating' => $rating_c,
            'idea_id' => $idea_b,
            'user_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'すでにネット上で話題になっていますが、稲作パートが超本格的です。
            しっかり作り込んであるので、こちらもしっかりと米作りを学んで挑みましょう。しかし、だからと言って理不尽だったりイライラしたりする事はありません。
            奥深い稲作の世界を体験しましょう。',
            'rating' => $rating_a,
            'idea_id' => $idea_a,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'review' => 'PVを始めて見たときから注目していたソフトでしたが、待っていた甲斐がありました。
            一日じっくりやっていましたが、アクションとしてかなり完成度が高いです。
            操作感が抜群に良く、直感的に動かせるため、やっていて気持ちが良い。
            特に羽衣システムが絶妙で、回避に投げ技、移動など様々な場面で使えます',
            'rating' => $rating_b,
            'idea_id' => $idea_b,
            'user_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        }
    }
}
