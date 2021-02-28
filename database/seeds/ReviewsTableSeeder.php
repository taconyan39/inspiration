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
            'idea_id' => $i + 10,
            'user_id' => 1,
            'created_at' => Carbon::createFromDate(2020, $r, $i),
            'updated_at' => Carbon::now(),
        ]);
    }
    for($i = 1;$i <= 10; $i++){

        $r = mt_rand(2, 5);
        $u = mt_rand(2, 8);
        $o = mt_rand(1,5);

        DB::table('reviews')->insert([
            'review' => 'とてもよい考えだと思います。おかげでとても着想がわきました。まだまだ荒削りな考えですが、今後の社会に必要な思考だと思います。',
            'rating' => $r,
            'idea_id' => $o,
            'user_id' => $u,
            'created_at' => Carbon::createFromDate(2020, $r, $u),
            'updated_at' => Carbon::now(),
        ]);
    }
    for($i = 1;$i <= 10; $i++){

        $r = mt_rand(3, 5);
        $u = mt_rand(2, 8);

        DB::table('reviews')->insert([
            'review' => 'ともすれば情報商材のひとつではないかと思っておりましたが、
            最近では、実名で活動されていることを聞きました。
            
            副業が解禁されつつも公言しにくい雰囲気のなかで素性を明かすのは勇気のいることだと思います。',
            'rating' => $r,
            'idea_id' => $o,
            'user_id' => $u,
            'created_at' => Carbon::createFromDate(2020, $r, $u),
            'updated_at' => Carbon::now(),
        ]);
    }

    for($i = 1;$i <= 10; $i++){

        $r = mt_rand(4, 5);
        $u = mt_rand(2, 8);

        DB::table('reviews')->insert([
            'review' => '「お金は節約しろ」と書いてある後に「お金は使え」と書いてあり、読んでいて「？？？」となりました。
            自己投資に使えという事なのでしょうが、そこの線引きや体験談もフワッとしており、わかりづらかったです。
            
            文章を通して、伝えたい大きなテーマのようなものは見えませんでした。
            ',
            'rating' => $r,
            'idea_id' => $o,
            'user_id' => $u,
            'created_at' => Carbon::createFromDate(2020, $r, $u),
            'updated_at' => Carbon::now(),
        ]);
    }
        
    }
}
