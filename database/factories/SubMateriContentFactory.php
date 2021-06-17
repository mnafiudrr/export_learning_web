<?php

namespace Database\Factories;

use App\Models\SubMateri;
use App\Models\SubMateriContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubMateriContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubMateriContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sub_materi_id'  => SubMateri::factory(),
            'content_type_id'    => 1,
            'value'      => $this->faker->sentence(),
            'row'        => $this->faker->randomNumber()
        ];
    }
}
