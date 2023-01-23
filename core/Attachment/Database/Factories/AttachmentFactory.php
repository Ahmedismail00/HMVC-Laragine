<?php

namespace Core\Attachment\Database\Factories;

use Core\Attachment\Models\Attachment as Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
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
            'path' => $this->faker->text(100),
            'type' => '',
            'usage' => $this->faker->text(100),
            'display_name' => $this->faker->text(100),
            'attachmentable_type' => $this->faker->text(100),
            'attachmentable_id' => $this->faker->integer(),

        ];
    }
}
