<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['whatsapp', 'instagram', 'email']),
            'label' => $this->faker->words(2, true),
            'value' => $this->faker->userName(),
            'icon' => $this->faker->optional()->randomElement([
                'bi bi-whatsapp', 'bi bi-instagram', 'bi bi-envelope'
            ]),
        ];
    }

}
