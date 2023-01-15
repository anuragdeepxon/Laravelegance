<?php

namespace Database\Factories\Agency;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agency>
 */
class AgencyFactory extends Factory
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
                    $query->where('name', 'agency');
                })->get()->random();
            },
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'website' => $this->faker->domainName,
            'logo' => 'https://picsum.photos/200',
            'description' => $this->faker->paragraph,
        ];
    }
}
