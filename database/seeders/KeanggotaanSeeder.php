<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keanggotaan;
use App\Models\User;
use App\Models\Organisasi;
use App\Models\Role;
use Carbon\Carbon;

class KeanggotaanSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua user, organisasi, dan role dari database
        $users = User::all();
        $organisasi = Organisasi::all();
        $roles = Role::all();

        // Looping untuk membuat data keanggotaan dummy
        foreach ($users as $user) {
            // Ambil organisasi dan role secara acak
            $organisasiRandom = $organisasi->random();
            $roleRandom = $roles->random();

            // Buat data keanggotaan untuk user saat ini
            Keanggotaan::create([
                'user_id' => $user->id,
                'organisasi_id' => $organisasiRandom->id,
                'role_id' => $roleRandom->id,
                'joined_at' => Carbon::now(), // Tanggal gabung saat ini
            ]);
        }
    }
}
