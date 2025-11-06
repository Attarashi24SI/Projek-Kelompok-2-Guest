<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['dataWarga'] = Warga::all();
        return view('pages.warga.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debugging optional (bisa diaktifkan kalau mau cek data)
        // dd($request->all());

        $data['no_ktp'] = $request->no_ktp;
        $data['nama'] = $request->nama;
        $data['gender'] = $request->gender;
        $data['agama'] = $request->agama;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['telp'] = $request->telp;
        $data['email'] = $request->email;

        // Simpan data ke database
        Warga::create($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pages.warga.index')->with('success', 'Data warga berhasil disimpan!');

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
        $warga = Warga::find($id);
        return view('pages.warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $warga = Warga::find($id);
        if ($warga) {
            $warga->no_ktp = $request->no_ktp;
            $warga->nama = $request->nama;
            $warga->gender = $request->gender;
            $warga->agama = $request->agama;
            $warga->pekerjaan = $request->pekerjaan;
            $warga->telp = $request->telp;
            $warga->email = $request->email;
            $warga->save();

            return redirect()->route('pages.warga.index')->with('success', 'Data warga berhasil diperbarui!');
        }

        return redirect()->route('pages.warga.index')->with('error', 'Data tidak ditemukan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('pages.warga.index');
    }
}
