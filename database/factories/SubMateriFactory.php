<?php

namespace Database\Factories;

use App\Models\SubMateri;
use App\Models\Materi;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubMateriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubMateri::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'materi_id' => Materi::factory(),
            'number' => $this->faker->randomNumber(),
            'title'  => $this->faker->word(),
            'logo'   => $this->faker->imageUrl(400, 400, 'animals', true)
        ];
    }
}
