<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
            'stock' => $this->faker->randomDigit,
            'sku' => 800,
            'description' => $this->faker->word(),
            'category_id' => function () {
                return ProductCategory::factory()->create()->id;
            },
        ];
    }
}
