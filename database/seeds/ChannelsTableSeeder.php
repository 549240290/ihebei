<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ChannelsTableSeeder extends Seeder
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
        while ($i <= 10){
            Db::table('channels')->insert([
                'pid'   => 0,
                'title' => $faker->title,
                'description'   => $faker->word,
                'sort'  =>  0,
                'template'  => 'default',
                'created_at'    => $faker->dateTime
            ]);
            $i++;
        }

    }
}
