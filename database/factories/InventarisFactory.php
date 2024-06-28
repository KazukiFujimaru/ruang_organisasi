<?php

namespace Database\Factories;

use App\Models\Inventaris;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventarisFactory extends Factory
{
    protected $model = Inventaris::class;

    public function definition()
    {
        $sebelum = $this->faker->numberBetween(1, 100);
        $ditambah = $this->faker->numberBetween(0, 50);
        $digunakan = $this->faker->numberBetween(0, $sebelum + $ditambah);
        $sisa = $sebelum + $ditambah - $digunakan;

        return [
            'nama' => $this->faker->word,
            'sebelum' => $sebelum,
            'ditambah' => $ditambah,
            'digunakan' => $digunakan,
            'sisa' => $sisa,
            'keterangan' => $this->faker->sentence,
            'bukti' => $this->faker->fileExtension, // Atau null jika bukti tidak wajib
            'organisasi_id' => 1,
        ];
    }
}
