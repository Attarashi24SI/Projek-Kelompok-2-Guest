<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Warga;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatDesa::with('warga')->paginate(10);
        return view('pages.perangkat.index', compact('perangkat'));
    }

    public function create()
    {
        $warga = Warga::orderBy('nama')->get();
        return view('pages.perangkat.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required|exists:warga,warga_id',
            'jabatan' => 'nullable|string|max:100',
            'nip' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'periode_mulai' => 'nullable|date',
            'periode_selesai' => 'nullable|date|after_or_equal:periode_mulai',
        ]);

        PerangkatDesa::create($request->all());

        return redirect()->route('perangkat.index')
            ->with('success', 'Data perangkat desa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);
        $warga = Warga::orderBy('nama')->get();

        return view('pages.perangkat.edit', compact('perangkat', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'warga_id' => 'required|exists:warga,warga_id',
            'jabatan' => 'nullable|string|max:100',
            'nip' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'periode_mulai' => 'nullable|date',
            'periode_selesai' => 'nullable|date|after_or_equal:periode_mulai',
        ]);

        $perangkat = PerangkatDesa::findOrFail($id);
        $perangkat->update($request->all());

        return redirect()->route('perangkat.index')
            ->with('success', 'Data perangkat desa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);
        $perangkat->delete();

        return redirect()->route('perangkat.index')
            ->with('success', 'Data perangkat desa berhasil dihapus');
    }
}
