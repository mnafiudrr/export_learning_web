<?php

namespace Database\Factories;

use App\Models\Quis;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'logo'  => $this->faker->imageUrl(400, 400, 'animals', true),
            'header'  => $this->faker->imageUrl(2000, 2000, 'animals', true)

        ];
    }
}
