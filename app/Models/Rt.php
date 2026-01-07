<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rt extends Model
{
    use HasFactory;

    protected $table = 'rt';
    protected $primaryKey = 'rt_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'rw_id',
        'nomor_rt',
        'ketua_rt_warga_id',
        'keterangan'
    ];

    // RT milik RW
    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id', 'rw_id');
    }

    // Ketua RT = Warga
    public function ketua()
    {
        return $this->belongsTo(Warga::class, 'ketua_rt_warga_id', 'warga_id');
    }
}
