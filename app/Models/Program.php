<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'description',
        'type',
        'jenis',
        'status',
        'tanggal',
        'dokumen',
        'organisasi_id'
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
