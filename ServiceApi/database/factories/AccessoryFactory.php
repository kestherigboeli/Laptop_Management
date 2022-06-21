<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AccessoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ram' => $this->faker->numberBetween(256, 512),
            'storage_type' => 'SSD',
            'processor' => 'i5 10000kQ',
            'added_by' => '1',
        ];
    }
}
