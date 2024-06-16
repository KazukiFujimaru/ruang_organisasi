<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'tanggal',
        'keterangan',
        'jumlah',
        'saldo',
        'bukti',
        'organisasi_id'
        ];
    
        public function organisasi()
        {
            return $this->belongsTo(organisasi::class);
        }

        public static function hitungSaldoTerbaru($organisasi_id)
        {
            $pemasukan = self::where('organisasi_id', $organisasi_id)->where('jenis', 'pemasukan')->sum('jumlah');
            $pengeluaran = self::where('organisasi_id', $organisasi_id)->where('jenis', 'pengeluaran')->sum('jumlah');
            return $pemasukan - $pengeluaran;
        }

}
