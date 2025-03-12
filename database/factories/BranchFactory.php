<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = 'App\Models\Branch';
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'town' => $this->faker->city,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'start_time' => $this->faker->dateTime,
            'end_time' => $this->faker->dateTime,
            'note' => $this->faker->text,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
