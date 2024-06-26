<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'tanggal',
        'jenis',
        'perihal',
        'asal_surat',
        'dokumen',
        'organisasi_id',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
