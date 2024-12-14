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
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description'=>'Help reduce the environmental impact of plastic pollution by collecting plastic waste from your surroundings. Plastic can take hundreds of years to decompose, and gathering 100 gram of plastic waste will contribute to cleaner communities and a healthier planet. Take action now and start cleaning up plastic litter to make a difference.',
            'target'=>100,
            'missionPicture'=>'assets/Mission - 1.png'
        ]);

        Mission::create([
            'title'=> 'Recycle Metal Cans',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Help reduce the environmental impact of metal waste by collecting and recycling metal cans. Metal can take hundreds of years to degrade and can have harmful effects on the environment. By gathering 20 metal cans, you contribute to cleaner communities, conserve natural resources, and reduce pollution. Recycle now and help create a more sustainable world.',
            'target'=>20,
            'missionPicture'=>'assets/Mission - 2.png'
        ]);

        Mission::create([
            'title'=> 'Collect Glass Bottles',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Glass bottles are 100% recyclable and can be reused multiple times without losing quality. Help reduce the environmental impact of glass waste by collecting 20 glass bottles. Recycling glass conserves raw materials, reduces the need for new resources, and lowers pollution. Start collecting glass bottles today to promote sustainability and reduce waste.',
            'target'=>20,
            'missionPicture'=>'assets/Mission - 3.png'
        ]);

        Mission::create([
            'title'=> 'Recycle Paper',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Recycle paper to save trees and reduce the amount of waste sent to landfills. By collecting and recycling 100 g of paper, you help conserve resources, reduce pollution, and save energy. Recycling paper contributes to a greener and more sustainable world. Start recycling today and play your part in preserving our forests and environment',
            'target'=>100,
            'missionPicture'=>'assets/Mission - 4.png'
        ]);

        Mission::create([
            'title'=> 'Collect Organic Waste',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Dry waste, including plastic, cardboard, and textiles, can be recycled and repurposed into new products, reducing the burden on landfills. By collecting 2 kg of dry waste, you contribute to reducing pollution, conserving natural resources, and promoting sustainability. Start collecting dry waste today to make a positive impact on the environment',
            'target'=>2,
            'missionPicture'=>'assets/Mission - 5.png'
        ]);

        Mission::create([
            'title'=> 'Collect Hazardous Household Waste',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Hazardous household waste, such as chemicals, paints, batteries, and electronics, poses significant risks to both human health and the environment. By safely collecting and disposing of 800 g of hazardous waste, you prevent dangerous pollutants from entering our ecosystems. Act responsibly today by safely collecting hazardous household waste for proper disposal.',
            'target'=>800,
            'missionPicture'=>'assets/Mission - 6.png'
        ]);

        Mission::create([
            'title' => 'Collect Metal Waste',
            'totalPoints' => 50 * $faker->numberBetween(6, 12),
            'description' => 'Gather and recycle metal waste like aluminum cans, scrap metals, or old utensils. Metals are highly recyclable, and every gram collected reduces the need for mining new materials. Help achieve the goal of collecting 2 kg of metal waste and earn valuable points!',
            'target' => 800,
            'missionPicture'=>'assets/Mission - 7.png'
        ]);

        Mission::create([
            'title' => 'Paper Recycling Mission',
            'totalPoints' => 50 * $faker->numberBetween(6, 12),
            'description' => 'Save trees by collecting paper waste for recycling. Magazines, newspapers, or used notebooks all count! Aim to gather 3 kg of paper waste and contribute to reducing deforestation while earning points.',
            'target' => 300,
            'missionPicture'=>'assets/Mission - 8.png'
        ]);

        Mission::create([
            'title' => 'Drop Off Electronic Waste',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Dispose of e-waste responsibly by dropping off items like old phones, chargers, or batteries at a SmartWaste station. This prevents harmful chemicals from polluting the environment. Complete the challenge by contributing 1 kg of electronic waste.',
            'target' => 600,
            'missionPicture'=>'assets/Mission - 9.png'
        ]);

        Mission::create([
            'title' => 'Food Waste Composting Mission',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Support sustainable practices by collecting food waste suitable for composting. Leftover vegetables, fruit peels, or coffee grounds can all be used. Reach the goal of 3 kg of compostable waste and make the planet greener!',
            'target' => 300,
            'missionPicture'=>'assets/Mission - 10.png'
        ]);

        Mission::create([
            'title' => 'Collect Styrofoam Waste',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Dispose of Styrofoam packaging and containers, which are not biodegradable and contribute to microplastic pollution. Join this mission to collect and recycle Styrofoam waste, making a significant impact on reducing environmental harm.',
            'target' => 120,
            'missionPicture'=>'assets/Mission - 11.png'
        ]);

        Mission::create([
            'title' => 'Collect Battery Waste',
            'totalPoints'=> 50 * $faker->numberBetween(6, 12),
            'description' => 'Gather used batteries, including AA, AAA, and others. Batteries contain toxic metals like cadmium and lead which can pollute the environment if not disposed of properly. Participate in this mission to collect and recycle used batteries, helping to protect our ecosystems.',
            'target' => 150,
            'missionPicture'=>'assets/Mission - 12.png'
        ]);

    }
}
