<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mahasiswa_id'=>$this->faker->numberBetween(1,10),
            'matakuliah_id'=>$this->faker->numberBetween(1,10),
            'nilai'=>$this->faker->randomFloat(2, 0, 100),
        ];
    }
}
