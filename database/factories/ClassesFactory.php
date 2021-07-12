<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ClassesFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['code' => "string", 'name' => "string", 'credit' => "int"])]
    public function definition() {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'name' => $this->faker->randomElement(['Programacion', 'SO', 'Redes', 'ASO', 'Pseint']),
            'credit' => $this->faker->randomDigit()
        ];
    }
}
