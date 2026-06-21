<?php

namespace Database\Factories;

use App\Models\GalleryItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryItemFactory extends Factory
{
    protected $model = GalleryItem::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
'image_path' => $this->faker->optional()->word . '.jpg',
            'sort_order' => $this->faker->numberBetween(1, 50),
            'status' => 'active',
        ];
    }
}

