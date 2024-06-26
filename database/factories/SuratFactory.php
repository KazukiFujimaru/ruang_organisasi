<?php

namespace Database\Factories;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuratFactory extends Factory
{
    protected $model = Surat::class;

    public function definition()
    {
        return [
            'nomor_surat' => $this->faker->unique()->numerify('SURAT-####'),
            'tanggal' => $this->faker->date,
            'jenis' => $this->faker->randomElement(['masuk', 'keluar']),
            'perihal' => $this->faker->sentence,
            'asal_surat' => $this->faker->company,
            'dokumen' => $this->faker->fileExtension, // Atau null jika dokumen tidak wajib
            'organisasi_id' => 1,
        ];
    }
}
