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
        'organisasi_id',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public static function hitungSaldoTerbaru($organisasi_id)
    {
        $pemasukan = self::where('organisasi_id', $organisasi_id)->where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = self::where('organisasi_id', $organisasi_id)->where('jenis', 'pengeluaran')->sum('jumlah');
        return $pemasukan - $pengeluaran;
    }

    public static function getLatestSaldo($organisasi_id)
    {
        $latestTransaction = self::where('organisasi_id', $organisasi_id)->orderBy('created_at', 'desc')->first();
        return $latestTransaction ? $latestTransaction->saldo : 0;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestSaldo = self::getLatestSaldo($model->organisasi_id);

            if ($model->jenis == 'pemasukan') {
                $model->saldo = $latestSaldo + $model->jumlah;
            } else {
                $model->saldo = $latestSaldo - $model->jumlah;
            }
        });
    }
}
