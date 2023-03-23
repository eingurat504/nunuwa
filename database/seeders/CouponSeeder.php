<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;
use App\Models\CouponType;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type = CouponType::first();

        Coupon::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'type_id' => $type->id,
            'value' => 30
        ]);

        Coupon::create([
            'code' => 'DEF456',
            'type' => 'percent',
            'type_id' => $type->id,
            'percent_off' => 50
        ]);
    }
    
}
