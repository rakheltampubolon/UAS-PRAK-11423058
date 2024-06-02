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
                        <h5 class="h3 mb-0">Data Member</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @can('member-create')
                <div class="row mb-3">
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-sm btn-success" href="{{ route('members.create') }}">Tambah Member
                            Baru</a>
                    </div>
                </div>
                @endcan
                <table class="table table-bordered" style="width: 100%">
                    <tr class="text-center text-uppercase">
                        <th width="20px">No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th width="200px">Aksi</th>
                    </tr>
                    @foreach ($members as $member)
                    <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td>{{ $member->user->name }}</td>
                        <td>{{ $member->no_hp }}</td>
                        <td>
                            <form action="{{ route('members.destroy',$member->id) }}" method="POST">
                                @can('member-list')
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('members.show',$member->id) }}">Detail</a>
                                @endcan
                                @can('member-edit')
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('members.edit',$member->id) }}">Ubah</a>
                                @endcan
                                @csrf
                                @method('DELETE')
                                @can('member-delete')
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

{!! $members->links() !!}

@endsection
