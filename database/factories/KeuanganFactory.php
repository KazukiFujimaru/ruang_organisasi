<?php

namespace Database\Factories;

use App\Models\Keuangan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KeuanganFactory extends Factory
{
    protected $model = Keuangan::class;

    public function definition()
    {
        $jenis = $this->faker->randomElement(['pemasukan', 'pengeluaran']);
        $jumlah = $this->faker->randomFloat(2, 1000, 100000);
        $saldo = ($jenis === 'pemasukan') ? $jumlah : -$jumlah;

        return [
            'nama' => $this->faker->word,
            'jenis' => $jenis,
            'tanggal' => $this->faker->date,
            'keterangan' => $this->faker->sentence,
            'jumlah' => $jumlah,
            'saldo' => $saldo,
            'bukti' => $this->faker->fileExtension, // Atau null jika bukti tidak wajib
            'organisasi_id' => 1,
        ];
    }
}
