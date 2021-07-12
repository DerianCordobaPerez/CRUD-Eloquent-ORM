<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     * @return array
     */
    #[ArrayShape(['id' => "int", 'name' => "string", 'lastName' => "mixed", 'title' => "int|null|string"])]
    public function definition() {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 15),
            'name' => substr($this->faker->name(),  0, 15),
            'lastName' => $this->faker->lastName(),
            'title' => $this->faker->randomElement(['LIC', 'ING', 'MSC', 'DOC'])
        ];
    }
}
