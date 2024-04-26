<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker,DB,Factory;
class hoteltypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
            $faker = faker\Factory::create();

            for($i =1; $i <= 10; $i++) {
                $data[] = [
                    'name'=> $faker->name,
                    'price'=>rand(90000,100000),
                    'description'=>$faker->text(255),
                    'content'=>$faker->text(255),
                    'image'=> $faker->imageUrl(640,480,'building',true),
                    'status'=>rand(1,2),
                    'featured'=>rand(1,2),
                  
                ];
            }
            DB::table('hoteltype')->insert($data);
    }
}
