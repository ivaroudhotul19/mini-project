<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->unique()->numberBetween(1,10),
            'nim'=>$this->faker->unique()->randomNumber(7, true),
            'nama'=>$this->faker->name,
            'jns_kelamin'=>$this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'tmpt_lahir'=>$this->faker->city,
            'tgl_lahir'=>$this->faker->dateTime,
            'alamat'=>$this->faker->address,
        ];
    }
}
