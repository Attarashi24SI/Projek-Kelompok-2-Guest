<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JabatanLembaga extends Model
{
    use HasFactory;

    protected $table = 'jabatan_lembaga';
    protected $primaryKey = 'jabatan_id';

    protected $fillable = [
        'lembaga_id',
        'nama_jabatan',
        'level',
    ];

    // Relasi ke tabel lembaga
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id', 'lembaga_id');
    }

    // Relasi ke anggota lembaga
    public function anggota()
    {
        return $this->hasMany(AnggotaLembaga::class, 'jabatan_id', 'jabatan_id');
    }
}
