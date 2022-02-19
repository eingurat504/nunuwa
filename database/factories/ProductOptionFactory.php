<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\OptionGroup;
use App\Models\Option;

class ProductOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'product_id' => function () {
                return Product::factory()->create()->id;
            },
            'option_group_id' => function () {
                return OptionGroup::factory()->create()->id;
            },
            'option_price' => 300,
            'option_id' => function () {
                return Option::factory()->create()->id;
            },
        ];
    }
}
