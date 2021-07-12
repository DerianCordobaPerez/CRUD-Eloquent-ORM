<?php

namespace Database\Factories;

use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ClassRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['id' => "int", 'name' => "string", 'location' => "mixed"])]
    public function definition() {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 15),
            'name' => $this->faker->randomElement(['Alcaila', 'Alcala 1', 'Alcala 2', 'Sala de maestria', 'Cisco']),
            'location' => $this->faker->city()
        ];
    }
}
