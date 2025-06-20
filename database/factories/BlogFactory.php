<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(mt_rand(2, 8)),
            "slug" => $this->faker->slug(),
            "excerpt" => $this->faker->paragraph(mt_rand(2, 5)),
            // "content"=> $this->faker->paragraphs(mt_rand(5, 10), true),
            "content" => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn($p) => "<p>$p</p>")
                ->join(''),
            "category_id" => mt_rand(1, 3),
            "user_id" => mt_rand(1, 5),
            "published" => random_int(0, 1) === 1,

        ];
    }
}
