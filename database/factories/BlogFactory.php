<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $statusEnum = ['active', 'inactive'];

        return [
            'title' => fake()->title(),
            'description' => fake()->text(1000),
            'status'=> $statusEnum[rand(0,1)]
        ];
    }
}
