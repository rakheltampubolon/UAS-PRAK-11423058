@extends('layouts.app')


@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Woop!</strong> Ada yang salah dengan inputan data kamu!.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Tambah Laporan Tahunan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('laporan-tahunan.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Tahun</strong>
                                        <select class="form-control" name="tahun">
                                            <option value="">Silahkan Pilih</option>
                                            @for ($i = date('Y'); $i>=(date('Y')-1); $i--)
                                            <option value="{{ $i }}">{{ $i }}
                                            </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>File Laporan</strong>
                                        <input type="file" name="file" class="form-control" data-height="100"
                                            accept=".xls,.xlsx" required>
                                        <small class="text-muted">
                                            Jenis file yang diperbolehkan: XLS | XLSX
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 text-left mt-4">
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ route('laporan-tahunan.index') }}">Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
