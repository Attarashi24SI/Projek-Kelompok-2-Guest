<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lembaga extends Model
{
    use HasFactory;

    protected $table = 'lembaga';
    protected $primaryKey = 'lembaga_id';
    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
        'kontak'
    ];

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id', 'lembaga_id');
    }

    // Relasi ke anggota lembaga
    public function anggota()
    {
        return $this->hasMany(AnggotaLembaga::class, 'jabatan_id', 'jabatan_id');
    }

    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
    }
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }
}
