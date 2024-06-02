@extends('layouts.app')


@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Data Laporan Mingguan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @can('laporan-create')
                <div class="row mb-3">
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-sm btn-success" href="{{ route('laporan-mingguan.create') }}">Tambah Laporan
                            Baru</a>
                    </div>
                </div>
                @endcan
                <table class="table table-bordered" style="width: 100%">
                    <tr class="text-center text-uppercase">
                        <th width="20px">No</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Minggu Ke</th>
                        <th>File</th>
                        @can('laporan-list')
                        <th width="200px">Aksi</th>
                        @endcan
                    </tr>
                    @foreach ($laporanMingguan as $laporan)
                    <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td>{{ $laporan->tahun }}</td>
                        <td>{{ $laporan->bulan }}</td>
                        <td>{{ $laporan->minggu_ke }}</td>
                        <td>
                            <a href="{{ asset('uploads/file/laporan-mingguan/'.$laporan->file_laporan) }}">
                                {{ $laporan['file_laporan'] }}
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('laporan-mingguan.destroy',$laporan->id) }}" method="POST">
                                @can('laporan-list')
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('laporan-mingguan.show',$laporan->id) }}">Detail</a>
                                @endcan
                                @can('laporan-edit')
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('laporan-mingguan.edit',$laporan->id) }}">Ubah</a>
                                @endcan
                                @csrf
                                @method('DELETE')
                                @can('laporan-delete')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

{!! $laporanMingguan->links() !!}

@endsection
