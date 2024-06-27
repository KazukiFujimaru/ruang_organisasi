<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{
    protected $fillable = [
        'user_id', 
        'organisasi_id', 
        'joined_at', 
        'divisi_role_id',
        'role_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function divisiRole()
    {
        return $this->belongsTo(DivisiRole::class);
    }
}
