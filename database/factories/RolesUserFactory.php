<?php

namespace Database\Factories;

use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class RolesUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoleUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['id' => "int", 'user_id' => "int", 'role_id' => "int"])]
    public function definition() {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 15),
            'user_id' => $this->faker->unique()->numberBetween(1, 15),
            'role_id' => $this->faker->unique()->numberBetween(1, 15)
        ];
    }
}
