<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['nama_lembaga'];
        $searchableColumns = ['nama_lembaga', 'deskripsi', 'kontak'];

        $query = Lembaga::filter($request, $filterableColumns)
            ->search($request, $searchableColumns);

        // Tambahkan eager load media
        $dataLembaga = $query->with('media')
            ->paginate(12)
            ->onEachSide(2);

        return view('pages.perangkat.lembaga.index', compact('dataLembaga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.perangkat.lembaga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            // file untuk media
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        // 1️Simpan data lembaga terlebih dahulu (tanpa image)
        $lembaga = Lembaga::create([
            'nama_lembaga' => $request->nama_lembaga,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);

        // 2️Jika user upload foto → simpan ke tabel media
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // SIMPAN FILE KE storage/app/public/media
            $path = $file->storeAs('media', $filename, 'public');

            // Buat URL publik yang benar
            $fileUrl = Storage::url($path); // hasil: /storage/media/xxx.jpg

            // Insert media
            Media::create([
                'ref_table' => 'lembaga',
                'ref_id' => $lembaga->lembaga_id,
                'file_url' => $fileUrl,
                'caption' => $lembaga->nama_lembaga,
                'mime_type' => $file->getMimeType(),
                'sort_order' => 0,
            ]);
        }


        // 3️Return seperti biasa
        return redirect()->route('pages.perangkat.lembaga.index')
            ->with('success', 'Data lembaga berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lembaga = Lembaga::with('media')->findOrFail($id);
        return view('pages.perangkat.lembaga.show', compact('lembaga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // load media supaya view edit bisa menampilkan foto yang ada
        $lembaga = Lembaga::with('media')->findOrFail($id);
        return view('pages.perangkat.lembaga.edit', compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lembaga = Lembaga::with('media')->findOrFail($id);

        $request->validate([
            'nama_lembaga' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        // Update data teks
        $lembaga->update([
            'nama_lembaga' => $request->nama_lembaga,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);

        // Jika user upload foto baru → hapus yg lama, simpan yg baru
        if ($request->hasFile('image')) {

            // HAPUS MEDIA LAMA
            foreach ($lembaga->media as $m) {

                if ($m->file_url) {
                    // Hilangkan /storage/
                    $relative = ltrim(str_replace('/storage/', '', $m->file_url), '/');

                    if (Storage::disk('public')->exists($relative)) {
                        Storage::disk('public')->delete($relative);
                    }
                }

                $m->delete();
            }

            // SIMPAN FOTO BARU
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // simpan ke storage/app/public/media
            $path = $file->storeAs('media', $filename, 'public');

            // URL publik → /storage/media/xxx.jpg
            $fileUrl = Storage::url($path);

            // Buat record media baru
            Media::create([
                'ref_table' => 'lembaga',
                'ref_id' => $lembaga->lembaga_id,
                'file_url' => $fileUrl,
                'caption' => $lembaga->nama_lembaga,
                'mime_type' => $file->getMimeType(),
                'sort_order' => 0,
            ]);
        }

        return redirect()
            ->route('pages.perangkat.lembaga.index')
            ->with('success', 'Data lembaga berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lembaga = Lembaga::with('media')->findOrFail($id);

        // hapus semua media terkait (file fisik + record)
        foreach ($lembaga->media as $m) {
            if ($m->file_url) {
                $relative = preg_replace('#^/storage/#', '', $m->file_url);
                if ($relative && Storage::disk('public')->exists($relative)) {
                    Storage::disk('public')->delete($relative);
                }
            }
            $m->delete();
        }

        $lembaga->delete();

        return redirect()->route('pages.perangkat.lembaga.index')
            ->with('success', 'Data lembaga berhasil dihapus!');
    }
}
