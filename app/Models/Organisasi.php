<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $fillable = [
        'nama', 
        'nama_instansi', 
        'nama_pembina', 
        'deskripsi', 
        'sejarah', 
        'tanggal_disahkan', 
        'logo_organisasi', 
        'logo_instansi', 
        'ADART', 
        'KODE'
    ];

    public function keanggotaan()
    {
        return $this->hasMany(Keanggotaan::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function divisis()
    {
        return $this->hasMany(Divisi::class);
    }

    public function keuangans()
    {
        return $this->hasMany(Keuangan::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }
}
