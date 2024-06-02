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
                        <h5 class="h3 mb-0">Data User</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-sm btn-success" href="{{ route('users.create') }}">Tambah User
                            Baru</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th width="20px">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="200px">Aksi</th>
                    </tr>
                    @foreach ($data as $key => $user)
                    <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->role_id))
                            @if ($user->role_id == 1)
                            <label class="badge badge-success">ADMIN</label>
                            @elseif($user->role_id == 2)
                            <label class="badge badge-info">PENGELOLA</label>
                            @else
                            <label class="badge badge-secondary">PLAYER</label>
                            @endif
                            @endif
                        </td>
                        <!-- <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td> -->
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}">Detail</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Ubah</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy',
                            $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Hapus', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

{!! $data->render() !!}

@endsection
