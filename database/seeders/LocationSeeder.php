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
            'locationDescription'=>'Jl. Raya Kb. Jeruk No.2, RT.4/RW.6, Sukabumi Utara, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11550',
            'locationPicture'=>'assets/Warehouse - 1.jpeg'
        ]);

        Location::create([
            'locationName'=>'Location 2',
            'locationDescription'=>'Jl. Rw. Belong No.68 9, RT.9/RW.15, Palmerah, Kec. Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11480',
            'locationPicture'=>'assets/Warehouse - 2.jpeg'
        ]);
    }
}
