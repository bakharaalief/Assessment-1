<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dosen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->text(50),
            'nidn' => $this->faker->unique()->numberBetween($min = 1000, $max = 2000),
            'alamat' => $this->faker->text(50),
            'kontak' => $this->faker->numberBetween($min = 1000000000, $max = 2000000000)
        ];
    }
}
