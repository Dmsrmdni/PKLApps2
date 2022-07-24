@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data jurusan
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Mata Pelajaran</label>
                            <input type="text" class="form-control "  value="{{ $jurusan->kode_mata_pelajaran }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control "  value="{{ $jurusan->nama_mata_pelajaran }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Semester</label>
                            <input type="text" class="form-control "  value="{{ $jurusan->semester }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jurusan</label>
                            <input type="text" class="form-control "  value="{{ $jurusan->jurusan }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('jurusan.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
