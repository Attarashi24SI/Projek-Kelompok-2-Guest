<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data dari tabel lembaga
        $dataLembaga = Lembaga::all();

        // Kirim data ke view
        return view('guest.perangkat.lembaga.index', compact('dataLembaga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest.perangkat.lembaga.create');
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
        ]);

        $data['nama_lembaga'] = $request->nama_lembaga;
        $data['deskripsi'] = $request->deskripsi;
        $data['kontak'] = $request->kontak;

        // Simpan ke database
        Lembaga::create($data);

        // Redirect ke halaman index
        return redirect()->route('guest.perangkat.lembaga.index')->with('success', 'Data lembaga berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lembaga = Lembaga::findOrFail($id);
        return view('guest.perangkat.lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, $id)
    {
        $lembaga = Lembaga::findOrFail($id);

        $lembaga->update([
            'nama_lembaga' => $request->nama_lembaga,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('guest.perangkat.lembaga.index')
            ->with('success', 'Data lembaga berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
