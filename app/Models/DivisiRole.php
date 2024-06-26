<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DivisiRole extends Model
{
    protected $fillable = ['nama', 'divisi_id'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
