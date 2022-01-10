<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, User::all()->count()),
            'category_id' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->word(),
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            // 'image' => $this->faker->imageUrl(100,100),
            'image'=> 'book-1.jpg',
            'pages' => $this->faker->numerify('###'),
            'price' => $this->faker->numerify('##.##')
        ];
    }
}
