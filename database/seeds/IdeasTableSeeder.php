<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IdeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ideas')->insert([
            'name' => '走れメロス',
            'price' => '9800',
            'summary' => '『走れメロス』（はしれメロス）は、太宰治の短編小説。処刑されるのを承知の上で友情を守ったメロスが、人の心を信じ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 1,
            'category_id' => 31,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '刺青',
            'price' => '9800',
            'summary' => 'それはまだ人々が「愚」と云う貴い徳を持って居て、世の中が今のように激しく軋（キシ）み合わない時分であった',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。笛を吹き、羊と遊んで暮して来た。け',
            'user_id' => 11,
            'category_id' => 51,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '細雪',
            'price' => '9800',
            'summary' => '「こいさん、頼むわ。―」鏡の中で、廊下からうしろへ這入って来た妙子を見ると、自分で襟を塗りかけていた刷毛（ハケ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治。',
            'user_id' => 21,
            'category_id' => 61,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
        DB::table('ideas')->insert([
            'name' => '城の崎にて',
            'price' => '9800',
            'summary' => '山の手線に跳ね飛ばされて怪我をした、その後養生に、一人で但馬の城崎温泉へ出掛けた。',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である',
            'user_id' => 1,
            'category_id' => 31,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '暗夜行路',
            'price' => '9800',
            'summary' => '私が自分の祖父のある事を知ったのは、私の母が産後の病気で死に、その後二月程経って不意に祖父が私の前に現れてき',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 11,
            'category_id' => 51,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '友情',
            'price' => '9800',
            'summary' => '野島がはじめて杉子に会ったのは帝劇の二階の正',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 21,
            'category_id' => 61,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
        DB::table('ideas')->insert([
            'name' => '走れメロス',
            'price' => '9800',
            'summary' => '『走れメロス』（はしれメロス）は、太宰治の短編小説。処刑されるのを承知の上で友情を守ったメロスが、人の心を信じ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 1,
            'category_id' => 31,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '刺青',
            'price' => '9800',
            'summary' => 'それはまだ人々が「愚」と云う貴い徳を持って居て、世の中が今のように激しく軋（キシ）み合わない時分であった',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。笛を吹き、羊と遊んで暮して来た。け',
            'user_id' => 11,
            'category_id' => 51,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '細雪',
            'price' => '9800',
            'summary' => '「こいさん、頼むわ。―」鏡の中で、廊下からうしろへ這入って来た妙子を見ると、自分で襟を塗りかけていた刷毛（ハケ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治。',
            'user_id' => 21,
            'category_id' => 61,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
        DB::table('ideas')->insert([
            'name' => '城の崎にて',
            'price' => '9800',
            'summary' => '山の手線に跳ね飛ばされて怪我をした、その後養生に、一人で但馬の城崎温泉へ出掛けた。',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である',
            'user_id' => 1,
            'category_id' => 31,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '暗夜行路',
            'price' => '9800',
            'summary' => '私が自分の祖父のある事を知ったのは、私の母が産後の病気で死に、その後二月程経って不意に祖父が私の前に現れてき',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 11,
            'category_id' => 51,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '友情',
            'price' => '9800',
            'summary' => '野島がはじめて杉子に会ったのは帝劇の二階の正',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 21,
            'category_id' => 61,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
        DB::table('ideas')->insert([
            'name' => '走れメロス',
            'price' => '9800',
            'summary' => '『走れメロス』（はしれメロス）は、太宰治の短編小説。処刑されるのを承知の上で友情を守ったメロスが、人の心を信じ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 1,
            'category_id' => 31,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '刺青',
            'price' => '9800',
            'summary' => 'それはまだ人々が「愚」と云う貴い徳を持って居て、世の中が今のように激しく軋（キシ）み合わない時分であった',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。笛を吹き、羊と遊んで暮して来た。け',
            'user_id' => 11,
            'category_id' => 51,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '細雪',
            'price' => '9800',
            'summary' => '「こいさん、頼むわ。―」鏡の中で、廊下からうしろへ這入って来た妙子を見ると、自分で襟を塗りかけていた刷毛（ハケ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治。',
            'user_id' => 21,
            'category_id' => 61,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
        DB::table('ideas')->insert([
            'name' => '城の崎にて',
            'price' => '9800',
            'summary' => '山の手線に跳ね飛ばされて怪我をした、その後養生に、一人で但馬の城崎温泉へ出掛けた。',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である',
            'user_id' => 1,
            'category_id' => 31,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '暗夜行路',
            'price' => '9800',
            'summary' => '私が自分の祖父のある事を知ったのは、私の母が産後の病気で死に、その後二月程経って不意に祖父が私の前に現れてき',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 11,
            'category_id' => 51,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '友情',
            'price' => '9800',
            'summary' => '野島がはじめて杉子に会ったのは帝劇の二階の正',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 21,
            'category_id' => 61,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
        DB::table('ideas')->insert([
            'name' => '走れメロス',
            'price' => '9800',
            'summary' => '『走れメロス』（はしれメロス）は、太宰治の短編小説。処刑されるのを承知の上で友情を守ったメロスが、人の心を信じ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 1,
            'category_id' => 31,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '刺青',
            'price' => '9800',
            'summary' => 'それはまだ人々が「愚」と云う貴い徳を持って居て、世の中が今のように激しく軋（キシ）み合わない時分であった',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。笛を吹き、羊と遊んで暮して来た。け',
            'user_id' => 11,
            'category_id' => 51,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '細雪',
            'price' => '9800',
            'summary' => '「こいさん、頼むわ。―」鏡の中で、廊下からうしろへ這入って来た妙子を見ると、自分で襟を塗りかけていた刷毛（ハケ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治。',
            'user_id' => 21,
            'category_id' => 61,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
        DB::table('ideas')->insert([
            'name' => '城の崎にて',
            'price' => '9800',
            'summary' => '山の手線に跳ね飛ばされて怪我をした、その後養生に、一人で但馬の城崎温泉へ出掛けた。',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である',
            'user_id' => 1,
            'category_id' => 31,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '暗夜行路',
            'price' => '9800',
            'summary' => '私が自分の祖父のある事を知ったのは、私の母が産後の病気で死に、その後二月程経って不意に祖父が私の前に現れてき',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 11,
            'category_id' => 51,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);

        DB::table('ideas')->insert([
            'name' => '友情',
            'price' => '9800',
            'summary' => '野島がはじめて杉子に会ったのは帝劇の二階の正',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 21,
            'category_id' => 61,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
    }
}
