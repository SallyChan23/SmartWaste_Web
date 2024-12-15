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
            'locationPicture'=>'assets/Warehouse - 1.jpeg',
            'urllocation'=>"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d350.5890879305392!2d106.78280372096403!3d-6.202523955614038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6c34b8163cb%3A0xaee51fb6f47d9daa!2sJl.%20Rw.%20Belong%2C%20RT.4%2FRW.6%2C%20Sukabumi%20Utara%2C%20Kec.%20Kb.%20Jeruk%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2011540!5e0!3m2!1sen!2sid!4v1734269844450!5m2!1sen!2sid" 
        ]);

        Location::create([
            'locationName'=>'Location 2',
            'locationDescription'=>'Jl. Rw. Belong No.68 9, RT.9/RW.15, Palmerah, Kec. Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11480',
            'locationPicture'=>'assets/Warehouse - 2.jpeg',
            'urllocation'=>"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4670896862667!2d106.78010897504916!3d-6.20194629378582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6c335b1a689%3A0x67672211a6126470!2sJl.%20Rw.%20Belong%20No.68%2C%20RT.9%2FRW.15%2C%20Palmerah%2C%20Kec.%20Palmerah%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2011530!5e0!3m2!1sid!2sid!4v1734267936637!5m2!1sid!2sid" 
        ]);
    }
}
