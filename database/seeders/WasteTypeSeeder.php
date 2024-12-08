<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WasteType;

class WasteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WasteType::create([
            'wasteTypeName'=>'Organic Waste'
        ]);

        WasteType::create([
            'wasteTypeName'=>'Non-Organic Waste'
        ]);
    }
}
