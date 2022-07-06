<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilAngket extends Model
{
    use HasFactory;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
