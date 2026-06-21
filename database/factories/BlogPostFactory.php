<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->optional()->paragraph,
            'content' => $this->faker->paragraphs(3, true),
'cover_image_path' => null,
            'status' => 'draft',
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 months', '-1 day'),
        ];
    }
}

