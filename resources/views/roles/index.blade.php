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
                        <h5 class="h3 mb-0">Data Role</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-sm btn-success" href="{{ route('roles.create') }}">Tambah Role
                            Baru</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th width="20px">No</th>
                        <th>Nama</th>
                        <th width="200px">Aksi</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                    <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('roles.show',$role->id) }}">Detail</a>
                            @can('role-edit')
                            <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">Ubah</a>
                            @endcan
                            @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy',
                            $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Hapus', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

{!! $roles->render() !!}

@endsection
