<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['id' => "int", 'name' => "int|null|string"])]
    public function definition() {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 15),
            'name' => $this->faker->randomElement(['create', 'edit'])
        ];
    }
}
