<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            
            'body' => 'eloquent is = ORM=> OBJECT RELATIONAL MAPPER:maps an object in db like an table to object in ur php code and laravel and eloquent rely heavy on Convention over Configuration
',
               
        ];
    }
}
