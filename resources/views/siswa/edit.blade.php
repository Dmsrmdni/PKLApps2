@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data siswa
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label class="form-label">Nomor Induk siswa</label>
                                <input type="text" class="form-control  @error('nis') is-invalid @enderror"
                                    name="nis" value="{{ $siswa->nis }}">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">nama_siswa</label>
                                <input type="text" class="form-control  @error('nama_siswa') is-invalid @enderror"
                                    name="nama_siswa" value="{{ $siswa->nama_siswa }}">
                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">alamat_siswa</label>
                                <input type="text" class="form-control  @error('alamat_siswa') is-invalid @enderror"
                                    name="alamat_siswa" value="{{ $siswa->alamat_siswa }}">
                                @error('alamat_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
