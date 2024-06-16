<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nama Pengguna',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'organization_id' => 1, // ID organisasi yang sesuai
            'role_id' => 1, // ID role yang sesuai
            'divisi_role_id' => 1, // ID divisi role yang sesuai
        ]);

        // Tambahkan seed lainnya sesuai kebutuhan
    }
}
