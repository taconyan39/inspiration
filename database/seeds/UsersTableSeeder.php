<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '山田　太郎',
            'email' => 'example@sample.com',
            'introduction' => '解説文',
            'password' => bcrypt('password'),
            'icon_img' => 'icon_sample01.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => '田中 花子',
            'email' => 'hanako@flower.com',
            'introduction' => '花子さん',
            'password' => bcrypt('password'),
            'icon_img' => 'icon_sample02.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => '織田 信長',
            'email' => 'nobunaga@desuyo.com',
            'introduction' => '天下武布',
            'password' => bcrypt('password'),
            'icon_img' => 'icon_sample03.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
