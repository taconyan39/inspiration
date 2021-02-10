<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
;
            DB::table('users')->insert([
                'name' => '山田太郎',
                'email' => 'example@sample.com',
                'introduction' => '自己紹介文',
                'password' => bcrypt('guestuser'),
                'icon_img' => 'icon_sample01.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample2',
                'email' => 'ochazukeyaro3@gmail.com',
                'introduction' => '自己紹介文',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample02.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample3',
                'email' => 'example3@sample.com',
                'introduction' => '自己紹介文',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample03.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample4',
                'email' => 'example4@sample.com',
                'introduction' => '自己紹介文',
                
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample5',
                'email' => 'example5@sample.com',
                'introduction' => '自己紹介文',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample05.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample6',
                'email' => 'example6@sample.com',
                'introduction' => '自己紹介文',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample06.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample7',
                'email' => 'example7@sample.com',
                'introduction' => '自己紹介文',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample07.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample8',
                'email' => 'example8@sample.com',
                'introduction' => '自己紹介文',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample08.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

    }
}
