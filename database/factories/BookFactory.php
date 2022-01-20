<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' =>User::factory(),
            'title'=>$this->faker->text(15),
            'slug'=> $this->faker->unique()->slug(),
            'photo'=> $this->faker->imageUrl(640, 800, 'cats', true, 'Faker', true),
            'page'=> $this->faker->numberBetween(200, 2500),
            'content'=>$this->faker->text(500),
        ];
    }
}
