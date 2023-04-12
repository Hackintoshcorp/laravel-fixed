<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'url' => $this->faker->url,
            'img' => 'demo_cropped_1.jpg',
            'seen' => $this->faker->randomElement(['yes', 'no']),
            'watch_soon' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
