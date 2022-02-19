<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'order_date' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'email' => $this->faker->sentence(4),
            'phone_no' => $this->faker->sentence(4),
            'amount' => 300,
            'tracking_no' => $this->faker->sentence(4),
            'city' => $this->faker->sentence(4),
            'country' => $this->faker->sentence(4),
            'shipping_address' => $this->faker->sentence(4),
            'shipping_address_2' => $this->faker->sentence(4),
            'user_id' => function () {
                return User::factory()->create()->id;
            },

        ];
    }
}
