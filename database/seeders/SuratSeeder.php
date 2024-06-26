<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    public function run()
    {
        Surat::factory()->count(50)->create();
    }
}
