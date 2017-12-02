<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $dataCategory = DB::table('categories')->pluck('id')->toArray();
     
        foreach(range(1, 50) as $index) {
            DB::table('movies')->insert([       /* DB database class */
                'category_id' =>$faker->randomElement($dataCategory),
                'title' => $faker->word,
                'actor' => $faker->name,
                'year' => rand(2000, 2020),
                'description' => $faker->text
            ]);
        }

    }
}