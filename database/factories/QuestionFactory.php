<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quis;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quis_id' => Quis::factory(),
            'question' => $this->faker->sentence(),
            'key'       =>'a',

        ];
    }
}
