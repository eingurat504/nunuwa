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
            'billing_first_name' => $this->faker->sentence(4),
            'billing_last_name' => $this->faker->sentence(4),
            'billing_email' => $this->faker->sentence(4),
            'billing_phone' => $this->faker->sentence(4),
            'tax' => 10,
            'sub_total' => 300,
            'total' => 300,
            'tracking_no' => $this->faker->sentence(4),
            'billing_city' => $this->faker->sentence(4),
            'billing_country' => $this->faker->sentence(4),
            'billing_state' => $this->faker->sentence(4),
            'billing_address_1' => $this->faker->sentence(4),
            'billing_address_2' => $this->faker->sentence(4),
            'user_id' => function () {
                return User::factory()->create()->id;
            },

        ];
    }
}
