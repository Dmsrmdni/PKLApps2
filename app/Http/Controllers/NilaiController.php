<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::all();
        return view('nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nis' => 'required|unique:nilais|max:255',
            'kode_mata_pelajaran' => 'required',
            'nilai' => 'required',
        ]);

        $nilai = new Nilai();
        $nilai->nis = $request->nis;
        $nilai->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $nilai->nilai = $request->nilai;

        if ($request->nilai >= 90 && $request->nilai <= 100) {
            $keterangan = 'A';
        } elseif ($request->nilai >= 80 && $request->nilai <= 89) {
            $keterangan = 'B';
        } elseif ($request->nilai >= 70 && $request->nilai <= 79) {
            $keterangan = 'C';
        } else {
            'Nilai Tidak Valid';
        }
        $nilai->keterangan = $keterangan;
        $nilai->save();
        return redirect()
            ->route('nilai.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Nilai $nilai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Nilai $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Nilai $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nis' => 'required',
            'kode_mata_pelajaran' => 'required',
            'nilai' => 'required',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->nis = $request->nis;
        $nilai->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $nilai->nilai = $request->nilai;
        if ($request->nilai >= 90 && $request->nilai <= 100) {
            $keterangan = 'A';
        } elseif ($request->nilai >= 80 && $request->nilai <= 89) {
            $keterangan = 'B';
        } elseif ($request->nilai >= 70 && $request->nilai <= 79) {
            $keterangan = 'C';
        } else {
            'Nilai Tidak Valid';
        }
        $nilai->keterangan = $keterangan;
        $nilai->save();
        return redirect()
            ->route('nilai.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Nilai $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();
        return redirect()
            ->route('nilai.index')
            ->with('succes', 'Data berhasil dihapus');
    }
}
