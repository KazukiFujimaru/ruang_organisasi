<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keuangan;

class KeuanganSeeder extends Seeder
{
    public function run()
    {
        Keuangan::factory()->count(50)->create();
    }
}
    