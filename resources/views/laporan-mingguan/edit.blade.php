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
                        <h5 class="h3 mb-0">Ubah Laporan Mingguan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('laporan-mingguan.update',$laporanMingguan->id) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Tahun</strong>
                                        <select class="form-control" name="tahun">
                                            <option value="">Silahkan Pilih</option>
                                            @for ($i = date('Y'); $i>=(date('Y')-1); $i--)
                                            <option value="{{ $i }}"
                                                {{ $laporanMingguan['tahun'] == $i ? 'selected' : '' }}>{{ $i }}
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
                                            <option value="Januari"
                                                {{ $laporanMingguan['bulan'] == 'Januari' ? 'selected' : '' }}>Januari
                                            </option>
                                            <option value="Februari"
                                                {{ $laporanMingguan['bulan'] == 'Februari' ? 'selected' : '' }}>Februari
                                            </option>
                                            <option value="Maret"
                                                {{ $laporanMingguan['bulan'] == 'Maret' ? 'selected' : '' }}>Maret
                                            </option>
                                            <option value="April"
                                                {{ $laporanMingguan['bulan'] == 'April' ? 'selected' : '' }}>April
                                            </option>
                                            <option value="Mei"
                                                {{ $laporanMingguan['bulan'] == 'Mei' ? 'selected' : '' }}>Mei</option>
                                            <option value="Juni"
                                                {{ $laporanMingguan['bulan'] == 'Juni' ? 'selected' : '' }}>Juni
                                            </option>
                                            <option value="Juli"
                                                {{ $laporanMingguan['bulan'] == 'Juli' ? 'selected' : '' }}>Juli
                                            </option>
                                            <option value="Agustus"
                                                {{ $laporanMingguan['bulan'] == 'Agustus' ? 'selected' : '' }}>Agustus
                                            </option>
                                            <option value="September"
                                                {{ $laporanMingguan['bulan'] == 'September' ? 'selected' : '' }}>
                                                September</option>
                                            <option value="Oktober"
                                                {{ $laporanMingguan['bulan'] == 'Oktober' ? 'selected' : '' }}>Oktober
                                            </option>
                                            <option value="November"
                                                {{ $laporanMingguan['bulan'] == 'November' ? 'selected' : '' }}>November
                                            </option>
                                            <option value="Desember"
                                                {{ $laporanMingguan['bulan'] == 'Desember' ? 'selected' : '' }}>Desember
                                            </option>
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
                                            <option value="1"
                                                {{ $laporanMingguan['minggu_ke'] == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2"
                                                {{ $laporanMingguan['minggu_ke'] == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3"
                                                {{ $laporanMingguan['minggu_ke'] == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4"
                                                {{ $laporanMingguan['minggu_ke'] == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5"
                                                {{ $laporanMingguan['minggu_ke'] == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>File Laporan</strong>
                                        @if(!empty($laporanMingguan['file_laporan']))
                                        <p class="small">
                                            File yang diupload:
                                            <a
                                                href="{{ asset('uploads/file/laporan-mingguan/'.$laporanMingguan->file_laporan) }}">
                                                {{ $laporanMingguan['file_laporan'] }}
                                            </a>
                                        </p>
                                        @endif
                                        <input type="file" name="file" class="form-control" data-height="100"
                                            data-allowed-file-extensions="xls xlsx">
                                        <small class="text-muted mx-2">
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
