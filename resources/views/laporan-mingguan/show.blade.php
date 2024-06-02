@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Detail Laporan Mingguan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <strong>Tahun:</strong>
                            {{ $laporanMingguan->tahun }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <strong>Bulan:</strong>
                            {{ $laporanMingguan->bulan }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <strong>Minggu Ke:</strong>
                            {{ $laporanMingguan->minggu_ke }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <strong>File:</strong>
                            <a href="{{ asset('uploads/file/laporan-mingguan/'.$laporanMingguan->file_laporan) }}">
                                {{ $laporanMingguan['file_laporan'] }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb mt-4">
                        <div class="text-left">
                            <a class="btn btn-sm btn-danger" href="{{ route('laporan-mingguan.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
