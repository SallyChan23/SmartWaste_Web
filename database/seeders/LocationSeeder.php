<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        Location::create([
            'locationName'=>'Location 1',
            'locationDescription'=>$faker->address(),
            'locationPicture'=>'assets/Warehouse - 1.jpeg'
        ]);

        Location::create([
            'locationName'=>'Location 2',
            'locationDescription'=>$faker->address(),
            'locationPicture'=>'assets/Warehouse - 2.jpeg'
        ]);
    }
}
