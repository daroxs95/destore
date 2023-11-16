<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word, // Generates a random word
            'description' => $this->faker->sentence,
            'release_date' => $this->faker->date,
        ];
    }

    public function withRandomTags()
    {
        return $this->afterCreating(function (Game $game) {
            $tagCount = rand(1, 5); // Adjust the range as needed
            $tags = Tag::inRandomOrder()->limit($tagCount)->get();
            $game->tags()->attach($tags);
        });
    }
}
