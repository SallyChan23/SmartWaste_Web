<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WasteDetails;
use App\Models\WasteType;

class WasteDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $OrganicType = WasteType::where('wasteTypeName','Organic Waste')->first();
        $NonOrganicType = WasteType::where('wasteTypeName','Non-Organic Waste')->first();

        WasteDetails::create([
            'wasteTypeId'=>$OrganicType->wasteTypeId,
            'wasteDetailName'=>'Daun kering'
        ]);

        WasteDetails::create([
            'wasteTypeId'=>$OrganicType->wasteTypeId,
            'wasteDetailName'=>'Kertas tissue'
        ]);

        WasteDetails::create([
            'wasteTypeId'=>$NonOrganicType->wasteTypeId,
            'wasteDetailName'=>'Botol Plastik'
        ]);

        WasteDetails::create([
            'wasteTypeId'=>$NonOrganicType->wasteTypeId,
            'wasteDetailName'=>'Kaleng Makanan dan Minuman'
        ]);

        WasteDetails::create([
            'wasteTypeId'=>$NonOrganicType->wasteTypeId,
            'wasteDetailName'=>'Kertas'
        ]);

        WasteDetails::create([
            'wasteTypeId'=>$NonOrganicType->wasteTypeId,
            'wasteDetailName'=>'Kardus'
        ]);
    }
}
