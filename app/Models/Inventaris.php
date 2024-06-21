<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    // protected $table = 'inventariss  '; // Menentukan nama tabel secara eksplisit

    protected $fillable = [
        'nama',
        'sebelum',
        'ditambah',
        'digunakan',
        'sisa',
        'keterangan',
        'bukti',
        'organisasi_id'
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
