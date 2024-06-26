<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\DivisiRole;

class DivisiRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisiRoles = [
            ['nama' => 'ketua divisi', 'divisi_id' => 1], // Divisi ID yang sesuai
            ['nama' => 'anggota', 'divisi_id' => 1],      // Divisi ID yang sesuai
        ];

        foreach ($divisiRoles as $divisiRole) {
            DivisiRole::create([
                'nama' => $divisiRole['nama'],
                'divisi_id' => $divisiRole['divisi_id'],
            ]);
        }
    }
}
