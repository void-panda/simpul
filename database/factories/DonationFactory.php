<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donor_name' => $this->faker->optional()->name(),
            'donor_email' => $this->faker->optional()->safeEmail(),
            'amount' => $this->faker->randomElement([50000, 100000, 200000, 500000, 1000000]),
            'note' => $this->faker->optional()->sentence(),
            'donated_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'proof' => null, // optional file/image
        ];
    }

}
