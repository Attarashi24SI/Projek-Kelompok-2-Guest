<?php
namespace App\Http\Controllers;
use App\Models\warga;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use App\Models\AnggotaLembaga;
use App\Models\JabatanLembaga;

class JabatanlembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan_lembaga = JabatanLembaga::with('lembaga')->get();

        return view('pages.jabatanlembaga.index', compact('jabatan_lembaga'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan_lembaga = JabatanLembaga::all();
        $lembaga = Lembaga::all();
        $warga = warga::all();

        return view('pages.jabatanlembaga.create', compact('jabatan_lembaga', 'lembaga', 'warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lembaga_id' => 'required|integer|exists:lembaga,lembaga_id',
            'nama_jabatan' => 'required|string|max:100',
            'level' => 'required|integer|min:1',
        ]);

        $data['lembaga_id'] = $request->lembaga_id;
        $data['nama_jabatan'] = $request->nama_jabatan;
        $data['level'] = $request->level;

        // Simpan ke database
        JabatanLembaga::create($data);

        return redirect()->route('jabatanlembaga.index')
            ->with('success', 'Data jabatan berhasil disimpan!');
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
        $jabatan = JabatanLembaga::findOrFail($id);
        $lembaga = Lembaga::all(); // untuk dropdown lembaga
        return view('pages.jabatanlembaga.edit', compact('jabatan', 'lembaga'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'lembaga_id' => 'required|exists:lembaga,lembaga_id',
            'level' => 'nullable|string|max:50',
        ]);

        $jabatan = JabatanLembaga::findOrFail($id);
        $jabatan->update($request->all());

        return redirect()->route('jabatanlembaga.index')
            ->with('success', 'Jabatan berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jabatan = JabatanLembaga::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatanlembaga.index')
            ->with('success', 'Data jabatan berhasil dihapus!');
    }

}
