<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk seeding
        $organisasis = [
            [
                'nama' => 'Organisasi A',
                'nama_instansi' => 'Instansi A',
                'nama_pembina' => 'Pembina A',
                'deskripsi' => 'Deskripsi Organisasi A',
                'sejarah' => 'Sejarah Organisasi A',
                'tanggal_disahkan' => '2023-01-01 00:00:00', // Sesuaikan dengan format yang diterima oleh MySQL
                'logo_organisasi' => 'path/to/logo_organisasi_a.png',
                'logo_instansi' => 'path/to/logo_instansi_a.png',
                'ADART' => 'path/to/adart_a.pdf',
                'KODE' => 'ORG-A-001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Organisasi B',
                'nama_instansi' => 'Instansi B',
                'nama_pembina' => 'Pembina B',
                'deskripsi' => 'Deskripsi Organisasi B',
                'sejarah' => 'Sejarah Organisasi B',
                'tanggal_disahkan' => '2023-02-01 00:00:00', // Sesuaikan dengan format yang diterima oleh MySQL
                'logo_organisasi' => 'path/to/logo_organisasi_b.png',
                'logo_instansi' => 'path/to/logo_instansi_b.png',
                'ADART' => 'path/to/adart_b.pdf',
                'KODE' => 'ORG-B-001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        // Insert data menggunakan DB facade
        DB::table('organisasis')->insert($organisasis);
    }
}
