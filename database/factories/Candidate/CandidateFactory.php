<?php

namespace Database\Factories\Candidate;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            return [
                'user_id' => function () {
                    return User::whereHas('role', function ($query) {
                        $query->where('name', 'candidate');
                    })->get()->random();
                },
                'address' => $this->faker->streetAddress,
                'regulatory_college' => $this->faker->company,
                'regulatory_college_no' => $this->faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
                'experience' => $this->faker->sentence,
                'resume' => $this->faker->imageUrl,
                'is_travel_allowance' => $this->faker->boolean,
                'is_meal_allowance' => $this->faker->boolean,
                'is_accomadation_allowance' => $this->faker->boolean,
                'travel_allowance_amount' => $this->faker->randomFloat(2, 0, 100),
                'meal_allowance_amount' => $this->faker->randomFloat(2, 0, 100),
                'accommodation_allowance_amount' => $this->faker->randomFloat(2, 0, 100),
                'rate_type' => $this->faker->randomElement(['hourly', 'daily', 'weekly', 'monthly']),
                'rate_amount' => $this->faker->randomFloat(2, 0, 100),
                'notes' => $this->faker->text,
                'shift_type' => $this->faker->randomElement(['full-time', 'part-time']),
            ];        
    }
}
