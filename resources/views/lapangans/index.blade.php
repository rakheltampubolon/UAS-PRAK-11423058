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
                        <h5 class="h3 mb-0">Data Lapangan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @can('lapangan-create')
                <div class="row mb-3">
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-sm btn-success" href="{{ route('lapangans.create') }}">Tambah Lapangan
                            Baru</a>
                    </div>
                </div>
                @endcan
                <table class="table table-bordered" style="width: 100%">
                    <tr class="text-center text-uppercase">
                        <th width="20px">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th width="200px">Aksi</th>
                    </tr>
                    @foreach ($lapangans as $lapangan)
                    <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td>{{ $lapangan->nama }}</td>
                        <td>{{ $lapangan->alamat }}</td>
                        <td>
                            <form action="{{ route('lapangans.destroy',$lapangan->id) }}" method="POST">
                                @can('lapangan-list')
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('lapangans.show',$lapangan->id) }}">Detail</a>
                                @endcan
                                @can('lapangan-edit')
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('lapangans.edit',$lapangan->id) }}">Ubah</a>
                                @endcan
                                @csrf
                                @method('DELETE')
                                @can('lapangan-delete')
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

{!! $lapangans->links() !!}

@endsection
