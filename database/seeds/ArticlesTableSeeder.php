<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('zh_CN');
        $i = 0;
        while ($i <= 50 ){
            Db::table('articles')->insert([
                'channel_id'       =>  rand(1,4),
                'origin'    => str_random(10),
                'writer'    => $faker->name,
                'title'     => $faker->title,
                'keyword'   => str_random(10),
                'description'=> str_random(10),
                'thumbnail' => 'http://www.lgo100.com/d/file/p/20190103/smallc4242ba34bfda5ef99430e18c8c9fc5f1546503181.jpg',
                'top'       => rand(0,9),
                'hots'      => rand(100,1000),
                'active'    => 1,
                'created_at'    => $faker->dateTime
            ]);
            $i++;
        }


    }
}
