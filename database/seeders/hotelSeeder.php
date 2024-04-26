<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker,DB,Factory;
class hotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $data = [];
            $faker = faker\Factory::create();

            for($i =1; $i <= 24; $i++) {
                $data[] = [
                    'name'=> $faker->name,
                    'status'=>rand(1,2),
                    'address'=>$faker->address,
                    'description'=>$faker->text(255),
                    'image'=> $faker->imageUrl(640,480,'hotels',true),
                    'star_number'=>rand(1,5),
                    'district_id'=>rand(1,24),
                    'parent_id'=>rand(1,5),
                ];
            }
            DB::table('hotel')->insert($data);
    }
}
