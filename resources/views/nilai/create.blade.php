@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data nilai
                    </div>
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nomor Induk nilai</label>
                                <input type="text" class="form-control  @error('nis') is-invalid @enderror"
                                    name="nis">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kode Mata Pelajaran </label>
                                <input type="text" class="form-control  @error('kode_mata_pelajaran') is-invalid @enderror"
                                    name="kode_mata_pelajaran">
                                @error('kode_mata_pelajaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nilai </label>
                                <input type="number" class="form-control  @error('nilai') is-invalid @enderror"
                                    name="nilai">
                                @error('nilai')
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
