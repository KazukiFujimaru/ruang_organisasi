<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $fillable = ['nama', 'keterangan', 'organisasi_id'];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function divisiRoles()
    {
        return $this->hasMany(DivisiRole::class);
    }
}
