<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\OptionGroup;
use App\Models\Option;
use App\Models\Order;
use App\Models\ProductOption;
use App\Models\ProductReview;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CouponSeeder::class);
     
    }
}
