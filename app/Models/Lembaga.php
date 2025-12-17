<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Lembaga extends Model
{
    use HasFactory;

    protected $table = 'lembaga';
    protected $primaryKey = 'lembaga_id';

    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
        'kontak',
        // 'image' — TIDAK DIPAKAI LAGI karena kita pindah ke tabel media
    ];

    /**
     * RELASI KE MEDIA
     * Setiap lembaga dapat memiliki banyak foto
     */
    public function media()
    {
        return $this->hasMany(\App\Models\Media::class, 'ref_id', 'lembaga_id')
            ->where('ref_table', 'lembaga')
            ->orderBy('sort_order')
            ->orderBy('media_id');
    }

    /**
     * FOTO UTAMA (ambil foto pertama)
     * Bisa dipakai di blade: $lembaga->main_image_url
     */
    public function getMainImageUrlAttribute()
    {
        $img = $this->media->first();
        return $img ? $img->file_url : null;
    }

    /**
     * Scope Search (tetap)
     */
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

    /**
     * Scope Filter (tetap)
     */
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
