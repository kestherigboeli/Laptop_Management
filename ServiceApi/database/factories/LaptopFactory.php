<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaptopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'make' => 'DELL',
            'model' => 'XPS',
            'serial_number' => 'KSHDDKL',
            'ram' => 16,
            'SSD' => 256,
            'HDD' => 1000,
        ];
    }
}
