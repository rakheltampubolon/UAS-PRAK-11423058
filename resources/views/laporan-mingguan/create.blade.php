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
                        <h5 class="h3 mb-0">Tambah Laporan Mingguan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('laporan-mingguan.store') }}" enctype="multipart/form-data"
                            method="POST">
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
                                        <strong>Bulan</strong>
                                        <select class="form-control" name="bulan">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Minggu Ke</strong>
                                        <select class="form-control" name="minggu_ke">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
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
                                        href="{{ route('laporan-mingguan.index') }}">Kembali</a>
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
