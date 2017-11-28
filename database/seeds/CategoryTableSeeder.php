<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' =>'action'],
            ['name' =>'drama'],
            ['name' =>'adventure'],
            ['name' =>'animation'],
            ['name' =>'romance'],
            ['name' =>'comedy']
            ];
    DB::table('categories')->insert($data);
    }
}
