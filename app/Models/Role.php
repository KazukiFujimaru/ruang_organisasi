<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nama', 'organisasi_id'];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
