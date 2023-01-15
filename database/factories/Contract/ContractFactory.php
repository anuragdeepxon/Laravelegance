<?php

namespace Database\Factories\Contract;

use App\Models\Employer\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employer_id' => function () {
                return Employer::all()->random();
            },
            'company_name' => $this->faker->company,
            'location' => $this->faker->city,
            'experience' => $this->faker->word,
            'from_start' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'to_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'shift_type' => $this->faker->word,
            'schedule' => $this->faker->word,
            'is_travel_allowance' => $this->faker->boolean,
            'is_meal_allowance' => $this->faker->boolean,
            'is_accomadation_allowance' => $this->faker->boolean,
            'travel_allowance_amount' => $this->faker->randomFloat(2, 0, 1000),
            'meal_allowance_amount' => $this->faker->randomFloat(2, 0, 1000),
            'rate_type' => $this->faker->word,
            'rate_amount' => $this->faker->randomFloat(2, 0, 1000),
            'notes' => $this->faker->sentence,
            'posting_start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'posting_end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
