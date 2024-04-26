<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker,DB;
class roomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $faker = faker\Factory::create();

        for($i =1; $i <= 30; $i++) {
            $data[] = [
                'name'=> $faker->name,
                'price'=>rand(90000,100000),
                'description'=>$faker->text(255),
                'content'=>$faker->text(255),
                'image'=> $faker->imageUrl(640,480,'rooms',true),
                'status'=>rand(1,2),
                'featured'=>rand(1,2),
                'room_quantity'=>rand(1,20),
                'room_quantity_status'=>rand(1,10),
                'hotel_id'=>rand(25,48),
                'user_id'=>rand(1,2),

            ];
        }
        DB::table('room')->insert($data);
    }
}
