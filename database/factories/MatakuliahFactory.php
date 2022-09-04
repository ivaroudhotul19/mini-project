<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_mk'=>$this->faker->unique()->numerify('IF-####'),
            'mk'=>$this->faker->word(),
            'sks'=>$this->faker->numberBetween(1, 4),
        ];
    }
}
