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
        Option::factory(1)->create();
        Order::factory(10)->create();
        OptionGroup::factory(2)->create();
        Product::factory(10)->create();
        ProductOption::factory(10)->create();
        ProductReview::factory(10)->create();

        $this->call(AdminSeeder::class);
        
        // $this->call(OptionSeeder::class);
        // $this->call(OptionGroupSeeder::class);
    }
}
