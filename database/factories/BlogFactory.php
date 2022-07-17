<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Autor' => $this->faker->name(),
            'Titulo' => $this->faker->sentence(),
            'Contenido' => $this->faker->paragraph(3),
            'Imagenurl' => $this->faker->imageUrl(640, 480),
        ];
    }
}
