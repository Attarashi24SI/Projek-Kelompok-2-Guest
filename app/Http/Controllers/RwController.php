<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Rw;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function index(Request $request)
    {
        $rws = Rw::with('ketua')->paginate(10);

        return view('pages.rw.index', compact('rws'));
    }

    public function create()
    {
        $warga = Warga::orderBy('nama')->get();
        return view('pages.rw.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_rw' => 'required|max:10',
            'ketua_rw_warga_id' => 'nullable|exists:warga,warga_id',
            'keterangan' => 'nullable'
        ]);

        $data = $request->all();

        // jika kosong, pastikan null
        if (!$request->filled('ketua_rw_warga_id')) {
            $data['ketua_rw_warga_id'] = null;
        }

        Rw::create($data);

        return redirect()->route('rw.index')->with('success', 'RW berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rw = Rw::findOrFail($id);
        $warga = Warga::orderBy('nama')->get();

        return view('pages.rw.edit', compact('rw', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_rw' => 'required|max:10',
            'ketua_rw_warga_id' => 'nullable|exists:warga,warga_id',
            'keterangan' => 'nullable'
        ]);

        $rw = Rw::findOrFail($id);

        $data = $request->all();

        if (!$request->filled('ketua_rw_warga_id')) {
            $data['ketua_rw_warga_id'] = null;
        }

        $rw->update($data);

        return redirect()->route('rw.index')->with('success', 'RW berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id);
        $rw->delete();

        return redirect()->route('rw.index')->with('success', 'RW berhasil dihapus');
    }
}
