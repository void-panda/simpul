<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $title = $this->faker->sentence(5);

        $startDate = $this->faker->dateTimeBetween('-2 months', '+1 month');
        $endDate = (clone $startDate)->modify('+'.rand(0, 5).' days');

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->paragraph(),
            'description' => $this->faker->paragraphs(4, true),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'location' => $this->faker->city,
            'cover_image' => 'https://picsum.photos/seed/' . $this->faker->unique()->word() . '/800/600',
            'status' => $this->faker->randomElement(['upcoming', 'ongoing', 'past']),
        ];
    }

}
