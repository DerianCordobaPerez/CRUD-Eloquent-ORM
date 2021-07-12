<?php

namespace Database\Factories;

use App\Models\Imparts;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ImpartsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imparts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['id' => "int", 'code_class' => "string", 'teacher_id' => "string", 'classroom_id' => "int"])]
    public function definition() {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 15),
            'code_class' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'teacher_id' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'classroom_id' => $this->faker->unique()->numberBetween(1, 15),
        ];
    }
}
