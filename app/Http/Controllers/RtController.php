<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;

class RtController extends Controller
{
    public function index()
    {
        // tampilkan RT + RW + Ketua RT
        $rts = Rt::with(['rw', 'ketua'])->paginate(10);
        return view('pages.rt.index', compact('rts'));
    }

    public function create()
    {
        $rw = Rw::orderBy('nomor_rw')->get();
        $warga = Warga::orderBy('nama')->get();

        return view('pages.rt.create', compact('rw', 'warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rw_id' => 'required|exists:rw,rw_id',
            'nomor_rt' => 'required|max:10',
            'ketua_rt_warga_id' => 'nullable|exists:warga,warga_id',
            'keterangan' => 'nullable',
        ]);

        $data = $request->all();

        if (!$request->filled('ketua_rt_warga_id')) {
            $data['ketua_rt_warga_id'] = null;
        }

        Rt::create($data);

        return redirect()->route('rt.index')->with('success', 'RT berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rt = Rt::findOrFail($id);
        $rw = Rw::orderBy('nomor_rw')->get();
        $warga = Warga::orderBy('nama')->get();

        return view('pages.rt.edit', compact('rt', 'rw', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rw_id' => 'required|exists:rw,rw_id',
            'nomor_rt' => 'required|max:10',
            'ketua_rt_warga_id' => 'nullable|exists:warga,warga_id',
            'keterangan' => 'nullable',
        ]);

        $rt = Rt::findOrFail($id);

        $data = $request->all();

        if (!$request->filled('ketua_rt_warga_id')) {
            $data['ketua_rt_warga_id'] = null;
        }

        $rt->update($data);

        return redirect()->route('rt.index')->with('success', 'RT berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rt = Rt::findOrFail($id);
        $rt->delete();

        return redirect()->route('rt.index')->with('success', 'RT berhasil dihapus');
    }
}
