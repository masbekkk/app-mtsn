<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    public function guru(){
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
