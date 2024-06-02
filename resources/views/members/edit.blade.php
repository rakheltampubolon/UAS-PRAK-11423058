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
                        <h5 class="h3 mb-0">Ubah Member</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('members.update',$member->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Nama</strong>
                                        <select name="user_id" class="form-control">
                                            <option value="">Silahkan Pilih</option>
                                            @foreach ($users as $user)
                                            <option value="{{$user->id}}"
                                                {{ $member['user_id'] == $user['id'] ? 'selected' : '' }}>
                                                {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Jenis Kelamin</strong>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="LAKI-LAKI"
                                                {{ $member['jenis_kelamin'] == 'LAKI-LAKI' ? 'selected' : '' }}>
                                                LAKI-LAKI</option>
                                            <option value="PEREMPUAN"
                                                {{ $member['jenis_kelamin'] == 'PEREMPUAN' ? 'selected' : '' }}>
                                                PEREMPUAN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>No HP</strong>
                                        <input type="text" name="no_hp" value="{{ $member->no_hp }}"
                                            class="form-control" placeholder="Masukkan Nomor HP">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Alamat</strong>
                                        <textarea class="form-control" style="height:150px" name="alamat"
                                            placeholder="Masukkan Alamat">{{ $member->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 text-left mt-4">
                                    <a class="btn btn-sm btn-danger" href="{{ route('members.index') }}">Kembali</a>
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
