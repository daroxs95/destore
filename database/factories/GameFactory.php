<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Game>
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
            'title' => $this->faker->unique()->word, // Generates a random word
            'description' => $this->faker->sentence,
            'creator_id' => User::all()->random()->id,
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

    public function configure()
    {
        return $this->afterCreating(function (Game $post) {
            $url = 'https://source.unsplash.com/random/1200x800';
            $post
                ->addMediaFromUrl($url)
                ->toMediaCollection();
        });
    }
}
