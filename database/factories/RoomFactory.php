<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'title' => null,
            'description' => $this->faker->paragraph,
            'capacity' => $this->faker->numberBetween(1, 6),
            'price_per_night' => $this->faker->randomFloat(2, 50, 500),
            'image_path' => null,
            'stars' => $this->faker->numberBetween(1, 5),
            'quality_label' => $this->faker->optional()->word,
            'status' => 'active',
        ];
    }
}

