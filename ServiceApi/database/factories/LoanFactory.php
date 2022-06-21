<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'request_id' => 1,
            'laptop_id' => 1,
            'loan_date' => now(),
            'renewal_date' => now(),
            'returned_date' => now(),
            'added_by' => 1,
        ];
    }
}
