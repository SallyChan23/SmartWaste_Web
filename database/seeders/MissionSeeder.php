<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Mission;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        Mission::create([
            'title'=>'Collect Plastic Waste',
            'totalPoints'=>50 * $faker->numberBetween(6, 12),
            'description'=>'Help reduce the environmental impact of plastic pollution by collecting plastic waste from your surroundings. Plastic can take hundreds of years to decompose, and gathering 900 gram of plastic waste will contribute to cleaner communities and a healthier planet. Take action now and start cleaning up plastic litter to make a difference.',
            'missionPicture'=>'assets/Mission -1.png'
        ]);

        Mission::create([
            'title'=> 'Recycle Metal Cans',
            'totalPoints'=>50 * $faker->numberBetween(6, 12),
            'description' => 'Help reduce the environmental impact of metal waste by collecting and recycling metal cans. Metal can take hundreds of years to degrade and can have harmful effects on the environment. By gathering 20 metal cans, you contribute to cleaner communities, conserve natural resources, and reduce pollution. Recycle now and help create a more sustainable world.',
            'missionPicture'=>'assets/Mission - 2.png'
        ]);

        Mission::create([
            'title'=> 'Collect Glass Bottles',
            'totalPoints'=>50 * $faker->numberBetween(6, 12),
            'description' => 'Glass bottles are 100% recyclable and can be reused multiple times without losing quality. Help reduce the environmental impact of glass waste by collecting 20 glass bottles. Recycling glass conserves raw materials, reduces the need for new resources, and lowers pollution. Start collecting glass bottles today to promote sustainability and reduce waste.',
            'missionPicture'=>'assets/Mission - 3.png'
        ]);

        Mission::create([
            'title'=> 'Recycle Paper',
            'totalPoints'=>50 * $faker->numberBetween(6, 12),
            'description' => 'Recycle paper to save trees and reduce the amount of waste sent to landfills. By collecting and recycling 1 kg of paper, you help conserve resources, reduce pollution, and save energy. Recycling paper contributes to a greener and more sustainable world. Start recycling today and play your part in preserving our forests and environment',
            'missionPicture'=>'assets/Mission - 4.png'
        ]);

        Mission::create([
            'title'=> 'Collect Organic Waste',
            'totalPoints'=>50 * $faker->numberBetween(6, 12),
            'description' => 'Dry waste, including plastic, cardboard, and textiles, can be recycled and repurposed into new products, reducing the burden on landfills. By collecting 2 kg of dry waste, you contribute to reducing pollution, conserving natural resources, and promoting sustainability. Start collecting dry waste today to make a positive impact on the environment',
            'missionPicture'=>'assets/Mission - 5.png'
        ]);

        Mission::create([
            'title'=> 'Collect Hazardous Household Waste',
            'totalPoints'=>50 * $faker->numberBetween(6, 12),
            'description' => 'Hazardous household waste, such as chemicals, paints, batteries, and electronics, poses significant risks to both human health and the environment. By safely collecting and disposing of 1 kg of hazardous waste, you prevent dangerous pollutants from entering our ecosystems. Act responsibly today by safely collecting hazardous household waste for proper disposal.',
            'missionPicture'=>'assets/Mission - 6.png'
        ]);

    }
}
