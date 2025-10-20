<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company . ' School',
            'jenjang' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'SMK']),
            'kabupaten' => $this->faker->city,
            'email' => $this->faker->unique()->safeEmail,
            'npsn' => $this->faker->unique()->numerify('########'),
        ];
    }
}
