<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaLembaga;
use App\Models\Lembaga;
use App\Models\Warga;
use App\Models\JabatanLembaga;

class AnggotaLembagaController extends Controller
{
    public function index()
    {
        $anggota_lembaga = AnggotaLembaga::with(['lembaga', 'warga', 'jabatan'])->get();
        return view('pages.anggotalembaga.index', compact('anggota_lembaga'));
    }

    public function create()
    {
        $lembaga = Lembaga::all();
        $warga = Warga::all();
        $jabatan = JabatanLembaga::all();
        return view('pages.anggotalembaga.create', compact('lembaga', 'warga', 'jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lembaga_id' => 'required|exists:lembaga,lembaga_id',
            'warga_id' => 'required|exists:warga,warga_id',
            'jabatan_id' => 'required|exists:jabatan_lembaga,jabatan_id',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'nullable|date|after_or_equal:tgl_mulai',
        ]);

        AnggotaLembaga::create($request->all());

        return redirect()->route('anggotalembaga.index')
            ->with('success', 'Anggota berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $anggota = AnggotaLembaga::findOrFail($id);
        $lembaga = Lembaga::all();
        $warga = Warga::all();
        $jabatan = JabatanLembaga::all();
        return view('pages.anggotalembaga.edit', compact('anggota', 'lembaga', 'warga', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lembaga_id' => 'required|exists:lembaga,lembaga_id',
            'warga_id' => 'required|exists:warga,warga_id',
            'jabatan_id' => 'required|exists:jabatan_lembaga,jabatan_id',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'nullable|date|after_or_equal:tgl_mulai',
        ]);

        $anggota = AnggotaLembaga::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('anggotalembaga.index')
            ->with('success', 'Anggota berhasil diupdate!');
    }

    public function destroy($id)
    {
        $anggota = AnggotaLembaga::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggotalembaga.index')
            ->with('success', 'Anggota berhasil dihapus!');
    }
}
