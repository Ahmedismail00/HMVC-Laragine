<?php

namespace Core\Admin\Database\Factories;

use Core\Admin\Models\Admin as Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(100),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->text(100),
            'phone' => $this->faker->phoneNumber(),
            'is_active' => $this->faker->boolean(),
            'type' => $this->faker->randomElement(['aa','bb','cc']),

        ];
    }
}
