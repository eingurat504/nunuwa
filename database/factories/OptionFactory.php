<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OptionGroup;

class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->sentence(4),
            'option_group_id' => function () {
                return OptionGroup::factory()->create()->id;
            },
        ];
    }
}