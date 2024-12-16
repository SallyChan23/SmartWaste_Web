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
            'voucherPicture'=>'assets/Voucher - PepperLunch.png'
        ]);

        Voucher::create([
            'name'=>'KFC',
            'pointsNeeded'=>400,
            'price'=>'Rp.70.000',
            'voucherPicture'=>'assets/Voucher - KFC.png'
        ]);

        Voucher::create([
            'name'=>'Kopi Kenangan',
            'pointsNeeded'=>500,
            'price'=>'Rp.100.000',
            'voucherPicture'=>'assets/Voucher - Kopken.png'
        ]);

        Voucher::create([
            'name'=>'Uniqlo',
            'pointsNeeded'=>300,
            'price'=>'Rp.125.000',
            'voucherPicture'=>'assets/Voucher - Uniqlo.png'
        ]);

        Voucher::create([
            'name'=>'Starbucks',
            'pointsNeeded'=>800,
            'price'=>'Rp.60.000',
            'voucherPicture'=>'assets/Voucher - Starbucks.png'
        ]);

        Voucher::create([
            'name'=>'Jco',
            'pointsNeeded'=>700,
            'price'=>'Rp.150.000',
            'voucherPicture'=>'assets/Voucher - JCO.png'
        ]);

        Voucher::create([
            'name'=>'Starbucks',
            'pointsNeeded'=>800,
            'price'=>'Rp.60.000',
            'voucherPicture'=>'assets/Voucher - Chatime.png'
        ]);

        Voucher::create([
            'name'=>'Reddog',
            'pointsNeeded'=>300,
            'price'=>'Rp.50.000',
            'voucherPicture'=>'assets/Voucher - Reddog.png'
        ]);

        Voucher::create([
            'name'=>'Taco Bell',
            'pointsNeeded'=>700,
            'price'=>'Rp.90.000',
            'voucherPicture'=>'assets/Voucher - TacoBell.png'
        ]);

        Voucher::create([
            'name'=>'Ranch Market',
            'pointsNeeded'=>600,
            'price'=>'Rp.125.000',
            'voucherPicture'=>'assets/Voucher - RanchMarket.png'
        ]);

        Voucher::create([
            'name'=>'Watsons',
            'pointsNeeded'=>700,
            'price'=>'Rp.100.000',
            'voucherPicture'=>'assets/Voucher - Watsons.png'
        ]);

        Voucher::create([
            'name'=>'Sour Sally',
            'pointsNeeded'=>500,
            'price'=>'Rp.70.000',
            'voucherPicture'=>'assets/Voucher - SourSally.png'
        ]);

        Voucher::create([
            'name'=>'Oh Some!',
            'pointsNeeded'=>900,
            'price'=>'Rp.120.000',
            'voucherPicture'=>'assets/Voucher - OhSome.png'
        ]);

        Voucher::create([
            'name'=>'XXI',
            'pointsNeeded'=>400,
            'price'=>'Rp.25.000',
            'voucherPicture'=>'assets/Voucher - XXI.png'
        ]);

        Voucher::create([
            'name'=>'IKEA',
            'pointsNeeded'=>800,
            'price'=>'Rp.60.000',
            'voucherPicture'=>'assets/Voucher - IKEA.png'
        ]);

        Voucher::create([
            'name'=>'Solaria',
            'pointsNeeded'=>300,
            'price'=>'Rp.30.000',
            'voucherPicture'=>'assets/Voucher - Solaria.png'
        ]);

        Voucher::create([
            'name'=>'Hokben',
            'pointsNeeded'=>450,
            'price'=>'Rp.20.000',
            'voucherPicture'=>'assets/Voucher - Hokben.png'
        ]);
    }
}
