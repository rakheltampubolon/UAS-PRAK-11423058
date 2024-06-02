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
                        @if(Auth::user()->role_id == 2)
                        <h5 class="h3 mb-0">Tambah Member</h5>
                        @elseif(Auth::user()->role_id == 3)
                        <h5 class="h3 mb-0">Register Member</h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('members.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Nama</strong>
                                        <select name="user_id" class="form-control">
                                            <option value="">Silahkan Pilih</option>
                                            @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- @if(Auth::user()->role_id == 3)
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Nama</strong>
                                        <select name="user_id" class="form-control" disabled>
                                                <option value="">Silahkan Pilih</option>
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}" {{ Auth::user()->id == $user['id'] ? 'selected' : '' }}>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            @endif -->
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Jenis Kelamin</strong>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                                            <option value="PEREMPUAN">PEREMPUAN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>No HP</strong>
                                        <input type="text" name="no_hp" class="form-control"
                                            placeholder="Masukkan Nomor HP">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Alamat</strong>
                                        <textarea class="form-control" style="height:100px" name="alamat"
                                            placeholder="Masukkan Alamat"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if(Auth::user()->role_id == 2)
                                <div class="col-xs-12 col-md-6 text-left mt-4">
                                    <a class="btn btn-sm btn-danger" href="{{ route('members.index') }}">Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                                @elseif(Auth::user()->role_id == 3)
                                <div class="col-xs-12 col-md-6 text-left mt-4">
                                    <button type="submit" class="btn btn-sm btn-primary">Register</button>
                                </div>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
