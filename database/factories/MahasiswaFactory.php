<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->text(50),
            'nim' => $this->faker->unique()->numberBetween($min = 1000, $max = 2000),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->text(50),
            'tahun_masuk' => $this->faker->numberBetween($min = 2000, $max = 2020)
        ];
    }
}
