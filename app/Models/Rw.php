<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rw extends Model
{
    use HasFactory;

    protected $table = 'rw';
    protected $primaryKey = 'rw_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nomor_rw',
        'ketua_rw_warga_id',
        'keterangan'
    ];

    // ✔️ RW punya banyak RT
    public function rt()
    {
        return $this->hasMany(Rt::class, 'rw_id', 'rw_id');
    }

    // ✔️ Ketua RW adalah warga
    public function ketua()
    {
        return $this->belongsTo(Warga::class, 'ketua_rw_warga_id', 'warga_id');
    }
}
