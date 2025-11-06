<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    public $timestamps = false;
    protected $fillable = [
        'no_ktp',
        'nama',
        'gender',
        'agama',
        'pekerjaan',
        'telp',
        'email',
    ];
}
