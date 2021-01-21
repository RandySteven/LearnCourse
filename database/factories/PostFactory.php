<?php

namespace Database\Factories;

use App\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'thumbnail' => '/images/posts/'.$this->faker->image('public/storage/images/posts', 640, 480, null, false),
            'user_id' => 1,
            'course_id' => $this->faker->numberBetween(1, 18),
            'body' => $this->faker->paragraph(3),
            'slug' => \Str::slug($this->faker->name)
        ];
    }
}
