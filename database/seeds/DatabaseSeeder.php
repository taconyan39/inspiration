<?php

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

        //本番用
        $this->call(IdeasTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(InterestTableSeeder::class);
        $this->call(BuyIdeableSeeder::class);
        
        // ローカル用
        // $this->call(ReviewsLocalTableSeeder::class);
        // $this->call(IdeasLocalTableSeeder::class);
        // $this->call(InterestLocalTableSeeder::class);
        // $this->call(BuyIdeaLocalTableSeeder::class);

    }
}
