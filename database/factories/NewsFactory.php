<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'category' => $this->faker->randomElement(['press-release', 'event-report', 'announcement']),
            'excerpt' => $this->faker->paragraph(),
            'content' => $this->faker->paragraphs(5, true),
            'cover_image' => 'https://picsum.photos/800/600?random=' . $this->faker->unique()->numberBetween(1, 9999),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
