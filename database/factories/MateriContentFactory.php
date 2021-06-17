<?php

namespace Database\Factories;

use App\Models\MateriContent;
use App\Models\Materi;

use Illuminate\Database\Eloquent\Factories\Factory;

class MateriContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MateriContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'materi_id'  => Materi::factory(),
            'content_type_id'    => 1,
            'value'      => $this->faker->sentence(),
            'row'        => $this->faker->randomNumber()
        ];
    }
}
