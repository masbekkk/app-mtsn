<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Siswa extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];
    
    public function sluggable(): array
    {
        return [
            'nama-slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function siswaPelanggaran(){
        return $this->hasMany(Pelanggaran::class, 'id');
    }

    public function prosentase()
    {
        return $this->hasMany(Prosentase::class, 'id');
    }

    public function hasilAngket()
    {
        return $this->hasMany(HasilAngket::class, 'id');
    }
}
