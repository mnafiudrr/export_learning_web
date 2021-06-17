<?php

namespace Database\Factories;

use App\Models\SubSubMateri;
use App\Models\SubMateri;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubSubMateriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubSubMateri::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'sub_materi_id' => SubMateri::factory(),
            'number' => $this->faker->randomNumber(),
            'title'  => $this->faker->word(),
            'logo'   => $this->faker->imageUrl(400, 400, 'animals', true)
       
        ];
    }
}
