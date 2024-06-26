<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'description' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['program kerja', 'kegiatan']),
            'jenis' => $this->faker->randomElement(['harian', 'mingguan', 'bulanan', 'tahunan']),
            'status' => $this->faker->randomElement(['terlaksana', 'tidak terlaksana']),
            'tanggal' => $this->faker->date,
            'dokumen' => $this->faker->fileExtension, // Atau null jika dokumen tidak wajib
            'organisasi_id' => 1,
        ];
    }
}
