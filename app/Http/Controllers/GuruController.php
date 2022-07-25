<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus',
            'foto' => 'required|image|max:2048',
        ]);

        $guru = new Guru();
        $guru->nama = $request->nama;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/guru/', $name);
            $guru->foto = $name;
        }
        $guru->nip = $request->nip;
        $guru->save();
        return redirect()
            ->route('guru.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'foto' => 'image|max:2048',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->nama = $request->nama;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/guru/', $name);
            $guru->foto = $name;
        }
        $guru->nip = $request->nip;
        $guru->save();
        return redirect()
            ->route('guru.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = guru::find($id);
        $foto = $guru->foto;

        if (!guru::destroy($id)) {
            return redirect()->back();
        }
        if ($foto) {
            $guru->deleteImage();
        }
        return redirect()
            ->route('guru.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
