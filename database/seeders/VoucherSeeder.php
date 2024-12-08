<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Voucher;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voucher::create([
            'name'=>'Sociolla',
            'pointsNeeded'=>350,
            'price'=>'Rp.50.000',
            'voucherPicture'=>'assets/Voucher - Sociolla.png'
        ]);

        Voucher::create([
            'name'=>'MAP',
            'pointsNeeded'=>500,
            'price'=>'Rp.100.000',
            'voucherPicture'=>'assets/Voucher - MAP.png'
        ]);

        Voucher::create([
            'name'=>'H&M',
            'pointsNeeded'=>600,
            'price'=>'Rp.125.000',
            'voucherPicture'=>'assets/Voucher - H&M.png'
        ]);

        Voucher::create([
            'name'=>'Pepper Lunch',
            'pointsNeeded'=>400,
            'price'=>'Rp.50.000',
            'voucherPicture'=>'assets/Voucher - PepperLunch.jpg'
        ]);
    }
}
