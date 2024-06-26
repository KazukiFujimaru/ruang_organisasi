<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara', 'Anggota'];

        foreach ($roles as $role) {
            Role::create([
                'nama' => $role,
                'organisasi_id' => 1, // ID organisasi yang sesuai
            ]);
        }
    }
}
