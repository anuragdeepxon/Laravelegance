<?php

namespace Database\Factories\Employer;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
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
                    $query->where('name', 'employer');
                })->get()->random();
            },
            'is_candidate_accept' => false,
            'is_employer_accept' => false,
            'candidate_accepted_at' => null,
            'employer_accepted_at' => null,
            'status' => 'IN REVIEW',
            'company_name' => $this->faker->company,
            'address' => $this->faker->address,
            'position' => $this->faker->jobTitle,
            'phone_one' => $this->faker->phoneNumber,
            'phone_two' => $this->faker->phoneNumber,
        ];
    }
}
