<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IdeasLocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('ideas')->insert([
            'title' => '学問のすすめ',
            'price' => 7777,
            'summary' => '『学問のすゝめ』（學問ノスヽメ、がくもんのすすめ）は、福沢諭吉の著書のひとつであり代表作である。初編',
            'content' => <<<EOF

「天は人の上に人を造らず人の下に人を造らず」と言えり。されば天より人を生ずるには、万人は万人みな同じ位にして、生まれながら貴賤きせん上下の差別なく、万物の霊たる身と心との働きをもって天地の間にあるよろずの物を資とり、もって衣食住の用を達し、自由自在、互いに人の妨げをなさずしておのおの安楽にこの世を渡らしめ給うの趣意なり。されども今、広くこの人間世界を見渡すに、かしこき人あり、おろかなる人あり、貧しきもあり、富めるもあり、貴人もあり、下人もありて、その有様雲と泥どろとの相違あるに似たるはなんぞや。その次第はなはだ明らかなり。『実語教じつごきょう』に、「人学ばざれば智なし、智なき者は愚人なり」とあり。されば賢人と愚人との別は学ぶと学ばざるとによりてできるものなり。また世の中にむずかしき仕事もあり、やすき仕事もあり。そのむずかしき仕事をする者を身分重き人と名づけ、やすき仕事をする者を身分軽き人という。すべて心を用い、心配する仕事はむずかしくして、手足を用うる力役りきえきはやすし。ゆえに医者、学者、政府の役人、または大なる商売をする町人、あまたの奉公人を召し使う大百姓などは、身分重くして貴き者と言うべし。

身分重くして貴ければおのずからその家も富んで、下々しもじもの者より見れば及ぶべからざるようなれども、その本もとを尋ぬればただその人に学問の力あるとなきとによりてその相違もできたるのみにて、天より定めたる約束にあらず。諺ことわざにいわく、「天は富貴を人に与えずして、これをその人の働きに与うるものなり」と。されば前にも言えるとおり、人は生まれながらにして貴賤・貧富の別なし。ただ学問を勤めて物事をよく知る者は貴人となり富人となり、無学なる者は貧人となり下人げにんとなるなり。

学問とは、ただむずかしき字を知り、解げし難き古文を読み、和歌を楽しみ、詩を作るなど、世上に実のなき文学を言うにあらず。これらの文学もおのずから人の心を悦よろこばしめずいぶん調法なるものなれども、古来、世間の儒者・和学者などの申すよう、さまであがめ貴とうとむべきものにあらず。古来、漢学者に世帯持ちの上手なる者も少なく、和歌をよくして商売に巧者なる町人もまれなり。これがため心ある町人・百姓は、その子の学問に出精するを見て、やがて身代を持ち崩すならんとて親心に心配する者あり。無理ならぬことなり。畢竟ひっきょうその学問の実に遠くして日用の間に合わぬ証拠なり。

されば今、かかる実なき学問はまず次にし、もっぱら勤むべきは人間普通日用に近き実学なり。譬たとえば、いろは四十七文字を習い、手紙の文言もんごん、帳合いの仕方、算盤そろばんの稽古、天秤てんびんの取扱い等を心得、なおまた進んで学ぶべき箇条ははなはだ多し。地理学とは日本国中はもちろん世界万国の風土ふうど道案内なり。究理学とは天地万物の性質を見て、その働きを知る学問なり。歴史とは年代記のくわしきものにて万国古今の有様を詮索する書物なり。経済学とは一身一家の世帯より天下の世帯を説きたるものなり。修身学とは身の行ないを修め、人に交わり、この世を渡るべき天然の道理を述べたるものなり。\r\n
　これらの学問をするに、いずれも西洋の翻訳書を取り調べ、たいていのことは日本の仮名にて用を便じ、あるいは年少にして文才ある者へは横文字をも読ませ、一科一学も実事を押え、その事につきその物に従い、近く物事の道理を求めて今日の用を達すべきなり。右は人間普通の実学にて、人たる者は貴賤上下の区別なく、みなことごとくたしなむべき心得なれば、この心得ありて後に、士農工商おのおのその分を尽くし、銘々の家業を営み、身も独立し、家も独立し、天下国家も独立すべきなり。

学問をするには分限を知ること肝要なり。人の天然生まれつきは、繋つながれず縛られず、一人前いちにんまえの男は男、一人前の女は女にて、自由自在なる者なれども、ただ自由自在とのみ唱えて分限ぶんげんを知らざればわがまま放蕩に陥ること多し。すなわちその分限とは、天の道理に基づき人の情に従い、他人の妨げをなさずしてわが一身の自由を達することなり。自由とわがままとの界さかいは、他人の妨げをなすとなさざるとの間にあり。譬たとえば自分の金銀を費やしてなすことなれば、たとい酒色に耽ふけり放蕩を尽くすも自由自在なるべきに似たれども、けっして然しからず、一人の放蕩は諸人の手本となり、ついに世間の風俗を乱りて人の教えに妨げをなすがゆえに、その費やすところの金銀はその人のものたりとも、その罪許すべからず。\r\n
　また自由独立のことは人の一身にあるのみならず、一国の上にもあることなり。わが日本はアジヤ州の東に離れたる一個の島国にて、古来外国と交わりを結ばず、ひとり自国の産物のみを衣食して不足と思いしこともなかりしが、嘉永年中アメリカ人渡来せしより外国交易こうえきのこと始まり、今日の有様に及びしことにて、開港の後もいろいろと議論多く、鎖国攘夷じょういなどとやかましく言いし者もありしかども、その見るところはなはだ狭く、諺ことわざに言う「井の底の蛙かわず」にて、その議論とるに足らず。日本とても西洋諸国とても同じ天地の間にありて、同じ日輪に照らされ、同じ月を眺め、海をともにし、空気をともにし、情合い相同じき人民なれば、ここに余るものは彼に渡し、彼に余るものは我に取り、互いに相教え互いに相学び、恥ずることもなく誇ることもなく、互いに便利を達し互いにその幸いを祈り、天理人道に従いて互いの交わりを結び、理のためにはアフリカの黒奴こくどにも恐れ入り、道のためにはイギリス・アメリカの軍艦をも恐れず、国の恥辱とありては日本国中の人民一人も残らず命を棄すてて国の威光を落とさざるこそ、一国の自由独立と申すべきなり。

しかるを支那人などのごとく、わが国よりほかに国なきごとく、外国の人を見ればひとくちに夷狄いてき夷狄と唱え、四足にてあるく畜類のようにこれを賤いやしめこれを嫌きらい、自国の力をも計らずしてみだりに外国人を追い払わんとし、かえってその夷狄に窘くるしめらるるなどの始末は、実に国の分限を知らず、一人の身の上にて言えば天然の自由を達せずしてわがまま放蕩に陥る者と言うべし。王制一度ひとたび新たなりしより以来、わが日本の政風大いに改まり、外は万国の公法をもって外国に交わり、内は人民に自由独立の趣旨を示し、すでに平民へ苗字みょうじ・乗馬を許せしがごときは開闢かいびゃく以来の一美事びじ、士農工商四民の位を一様にするの基もといここに定まりたりと言うべきなり。

されば今より後は日本国中の人民に、生まれながらその身につきたる位などと申すはまずなき姿にて、ただその人の才徳とその居処きょしょとによりて位もあるものなり。たとえば政府の官吏を粗略にせざるは当然のことなれども、こはその人の身の貴きにあらず、その人の才徳をもってその役儀を勤め、国民のために貴き国法を取り扱うがゆえにこれを貴ぶのみ。人の貴きにあらず、国法の貴きなり。旧幕府の時代、東海道にお茶壺の通行せしは、みな人の知るところなり。そのほか御用の鷹たかは人よりも貴く、御用の馬には往来の旅人も路を避くる等、すべて御用の二字を付くれば、石にても瓦かわらにても恐ろしく貴きもののように見え、世の中の人も数千百年の古いにしえよりこれを嫌いながらまた自然にその仕来しきたりに慣れ、上下互いに見苦しき風俗を成せしことなれども、畢竟これらはみな法の貴きにもあらず、品物の貴きにもあらず、ただいたずらに政府の威光を張り人を畏おどして人の自由を妨げんとする卑怯なる仕方にて、実なき虚威というものなり。今日に至りてはもはや全日本国内にかかる浅ましき制度、風俗は絶えてなきはずなれば、人々安心いたし、かりそめにも政府に対して不平をいだくことあらば、これを包みかくして暗に上かみを怨うらむることなく、その路を求め、その筋により静かにこれを訴えて遠慮なく議論すべし。天理人情にさえ叶うことならば、一命をも抛なげうちて争うべきなり。これすなわち一国人民たる者の分限と申すものなり。

前条に言えるとおり、人の一身も一国も、天の道理に基づきて不覊ふき自由なるものなれば、もしこの一国の自由を妨げんとする者あらば世界万国を敵とするも恐るるに足らず、この一身の自由を妨げんとする者あらば政府の官吏も憚はばかるに足らず。ましてこのごろは四民同等の基本も立ちしことなれば、いずれも安心いたし、ただ天理に従いて存分に事をなすべしとは申しながら、およそ人たる者はそれぞれの身分あれば、またその身分に従い相応の才徳なかるべからず。身に才徳を備えんとするには物事の理を知らざるべからず。物事の理を知らんとするには字を学ばざるべからず。これすなわち学問の急務なるわけなり。

昨今の有様を見るに、農工商の三民はその身分以前に百倍し、やがて士族と肩を並ぶるの勢いに至り、今日にても三民のうちに人物あれば政府の上に採用せらるべき道すでに開けたることなれば、よくその身分を顧み、わが身分を重きものと思い、卑劣の所行あるべからず。およそ世の中に無知文盲の民ほど憐あわれむべくまた悪にくむべきものはあらず。智恵なきの極きわみは恥を知らざるに至り、己おのが無智をもって貧窮に陥り飢寒に迫るときは、己が身を罪せずしてみだりに傍かたわらの富める人を怨み、はなはだしきは徒党を結び強訴ごうそ・一揆いっきなどとて乱暴に及ぶことあり。恥を知らざるとや言わん、法を恐れずとや言わん。天下の法度ほうどを頼みてその身の安全を保ち、その家の渡世をいたしながら、その頼むところのみを頼みて、己が私欲のためにはまたこれを破る、前後不都合の次第ならずや。あるいはたまたま身本みもと慥たしかにして相応の身代ある者も、金銭を貯たくわうることを知りて子孫を教うることを知らず。教えざる子孫なればその愚なるもまた怪しむに足らず。ついには遊惰放蕩に流れ、先祖の家督をも一朝の煙となす者少なからず。

かかる愚民を支配するにはとても道理をもって諭さとすべき方便なければ、ただ威をもって畏おどすのみ。西洋の諺ことわざに「愚民の上に苛からき政府あり」とはこのことなり。こは政府の苛きにあらず、愚民のみずから招く災わざわいなり。愚民の上に苛き政府あれば、良民の上には良き政府あるの理なり。ゆえに今わが日本国においてもこの人民ありてこの政治あるなり。仮りに人民の徳義今日よりも衰えてなお無学文盲に沈むことあらば、政府の法も今一段厳重になるべく、もしまた、人民みな学問に志して、物事の理を知り、文明の風に赴おもむくことあらば、政府の法もなおまた寛仁大度の場合に及ぶべし。法の苛からきと寛ゆるやかなるとは、ただ人民の徳不徳によりておのずから加減あるのみ。人誰か苛政を好みて良政を悪にくむ者あらん、誰か本国の富強を祈らざる者あらん、誰か外国の侮りを甘んずる者あらん、これすなわち人たる者の常の情なり。今の世に生まれ報国の心あらん者は、必ずしも身を苦しめ思いを焦がすほどの心配あるにあらず。ただその大切なる目当ては、この人情に基づきてまず一身の行ないを正し、厚く学に志し、博ひろく事を知り、銘々の身分に相応すべきほどの智徳を備えて、政府はその政まつりごとを施すに易やすく、諸民はその支配を受けて苦しみなきよう、互いにその所を得てともに全国の太平を護らんとするの一事のみ。今余輩の勧むる学問ももっぱらこの一事をもって趣旨とせり。
EOF
,
            'user_id' => 1,
            'category_id' => 3,
            'sold_flg' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, 1, 10),
            ]);

        
        DB::table('ideas')->insert([
            'title' => '刺青',
            'price' => 23000,
            'summary' => 'それはまだ人々が「愚」と云う貴い徳を持って居て、世の中が今のように激しく軋（キシ）み合わない時分であった',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。笛を吹き、羊と遊んで暮して来た。け',
            'user_id' => 1,
            'category_id' => 1,
            'sold_flg' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2021, 2, 11),
            ]);

       
        DB::table('ideas')->insert([
            'title' => '細雪',
            'price' => 9090,
            'summary' => '「こいさん、頼むわ。―」鏡の中で、廊下からうしろへ這入って来た妙子を見ると、自分で襟を塗りかけていた刷毛（ハケ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治。',
            'user_id' => 2,
            'category_id' => 4,
            'sold_flg' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2021, 1, 13),
            ]);
   
        DB::table('ideas')->insert([
            'title' => '城の崎にて',
            'price' => 1430,
            'summary' => '山の手線に跳ね飛ばされて怪我をした、その後養生に、一人で但馬の城崎温泉へ出掛けた。',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である',
            'user_id' => 1,
            'category_id' => 7,
            'sold_flg' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, 2, 14),
            ]);
        
        DB::table('ideas')->insert([
            'title' => '暗夜行路',
            'price' => 97862,
            'summary' => '私が自分の祖父のある事を知ったのは、私の母が産後の病気で死に、その後二月程経って不意に祖父が私の前に現れてき',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 1,
            'category_id' => 6,
            'sold_flg' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, 1, 15),
            ]);
       
        DB::table('ideas')->insert([
            'title' => '友情',
            'price' => 14800,
            'summary' => '野島がはじめて杉子に会ったのは帝劇の二階の正',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => 2,
            'category_id' => 5,
            'sold_flg' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, 2, 16),
            ]);
        for($i = 1; $i <= 10; $i++){

            $u = mt_rand(2 , 8);
            $c = mt_rand(1 , 7);
        DB::table('ideas')->insert([
            'title' => '走れメロス',
            'price' => $u * 1000 + $c * 100 + $i * 10,
            'summary' => '『走れメロス』（はしれメロス）は、太宰治の短編小説。処刑されるのを承知の上で友情を守ったメロスが、人の心を信じ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => $u,
            'category_id' => $c,
            'sold_flg' => 1,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, $i, $i),
            ]);
        }
        for($i = 1; $i <= 10; $i++){

            $u = mt_rand(2 , 8);
            $c = mt_rand(1 , 7);

        DB::table('ideas')->insert([
            'title' => '刺青',
            'price' => $u * 1000 + $c * 100 + $i * 10,
            'summary' => 'それはまだ人々が「愚」と云う貴い徳を持って居て、世の中が今のように激しく軋（キシ）み合わない時分であった',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。笛を吹き、羊と遊んで暮して来た。け',
            'user_id' => $u,
            'category_id' => $c,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, $i, $i + 1),
            ]);
        }

        for($i = 1; $i <= 10; $i++){

            $u = mt_rand(2 , 8);
            $c = mt_rand(1 , 7);

        DB::table('ideas')->insert([
            'title' => '細雪',
            'price' => $u * 1000 + $c * 100 + $i * 10,
            'summary' => '「こいさん、頼むわ。―」鏡の中で、廊下からうしろへ這入って来た妙子を見ると、自分で襟を塗りかけていた刷毛（ハケ',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治。',
            'user_id' => $u,
            'category_id' => $c,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, $i + 1, $i + 2),
            ]);
        }
   
        for($i = 1; $i <= 10; $i++){

            $u = mt_rand(2 , 8);
            $c = mt_rand(2, 7);
        DB::table('ideas')->insert([
            'title' => '城の崎にて',
            'price' => $u * 1000 + $c * 100 + $i * 10,
            'summary' => '山の手線に跳ね飛ばされて怪我をした、その後養生に、一人で但馬の城崎温泉へ出掛けた。',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である',
            'user_id' => $u,
            'category_id' => $c,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, $i + 2, $i + 3),
            ]);
        }

        for($i = 1; $i <= 10; $i++){

            $u = mt_rand(2 , 8);
            $c = mt_rand(2 , 7);
        DB::table('ideas')->insert([
            'title' => '暗夜行路',
            'price' => $u * 1000 + $c * 100 + $i * 10,
            'summary' => '私が自分の祖父のある事を知ったのは、私の母が産後の病気で死に、その後二月程経って不意に祖父が私の前に現れてき',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => $u,
            'category_id' => $c,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, $i + 3, $i + 4),
            ]);
        }
       
            for($i = 1; $i <= 10; $i++){
                $u = mt_rand(2 , 8);
            $c = mt_rand(2 , 7);
        DB::table('ideas')->insert([
            'title' => '友情',
            'price' => $u * 1000 + $c * 100 + $i * 10,
            'summary' => '野島がはじめて杉子に会ったのは帝劇の二階の正',
            'content' => 'メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。',
            'user_id' => $u,
            'category_id' => $c,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::createFromDate(2020, $i + 4, $i + 5),
        ]);
            }

    }
}
