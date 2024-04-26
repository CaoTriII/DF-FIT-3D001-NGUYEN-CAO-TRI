<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker,DB,Factory;
class HotelServiceSeeder extends Seeder
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
                'description'=>$faker->text(255),
                'hotels_id'=>rand(25,48),

            ];
        }
        DB::table('service')->insert($data);
    }
}
