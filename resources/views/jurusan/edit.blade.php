@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data jurusan
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label class="form-label">Kode Mata Pelajaran</label>
                                <input type="text" class="form-control  @error('kode_mata_pelajaran') is-invalid @enderror"
                                    name="kode_mata_pelajaran" value="{{ $jurusan->kode_mata_pelajaran }}">
                                @error('kode_mata_pelajaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control  @error('nama_mata_pelajaran') is-invalid @enderror"
                                    name="nama_mata_pelajaran" value="{{ $jurusan->nama_mata_pelajaran }}">
                                @error('nama_mata_pelajaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">semester</label>
                                <input type="number" class="form-control  @error('semester') is-invalid @enderror"
                                    name="semester" value="{{ $jurusan->semester }}">
                                @error('semester')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">jurusan</label>
                                <input type="text" class="form-control  @error('jurusan') is-invalid @enderror"
                                    name="jurusan" value="{{ $jurusan->jurusan }}">
                                @error('jurusan')
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
