<?php

namespace Database\Factories;

use App\Models\SubSubMateriContent;

use App\Models\SubSubMateri;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubSubMateriContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubSubMateriContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sub_sub_materi_id'  => SubSubMateri::factory(),
            'content_type_id'    => 1,
            'value'      => $this->faker->sentence(),
            'row'        => $this->faker->randomNumber()
        ];
    }
}
