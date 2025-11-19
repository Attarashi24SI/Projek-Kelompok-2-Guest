<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaLembaga extends Model
{
    use HasFactory;

    protected $table = 'anggota_lembaga';
    protected $primaryKey = 'anggota_id';
    protected $fillable = [
        'lembaga_id',
        'warga_id',
        'jabatan_id',
        'tgl_mulai',
        'tgl_selesai',
    ];

    // Relasi ke Lembaga
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id', 'lembaga_id');
    }

    // Relasi ke Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    // Relasi ke JabatanLembaga
    public function jabatan()
    {
        return $this->belongsTo(JabatanLembaga::class, 'jabatan_id', 'jabatan_id');
    }
}
