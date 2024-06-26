<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisis = [
            ['nama' => 'Divisi IT', 'keterangan' => 'Divisi Teknologi Informasi'],
            ['nama' => 'Divisi HR', 'keterangan' => 'Divisi Sumber Daya Manusia']
        ];

        foreach ($divisis as $divisi) {
            Divisi::create([
                'nama' => $divisi['nama'],
                'keterangan' => $divisi['keterangan'],
                'organisasi_id' => 1, // ID organisasi yang sesuai
            ]);
        }
    }
}
