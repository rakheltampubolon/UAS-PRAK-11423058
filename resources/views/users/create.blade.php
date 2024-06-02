@extends('layouts.app')


@section('content')


@if (count($errors) > 0)
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
                        <h5 class="h3 mb-0">Tambah User</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <strong>Nama</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Masukkan Nama','class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <strong>Email</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'Masukkan Email','class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <strong>Password</strong>
                                    {!! Form::password('password', array('placeholder' => 'Masukkan Password','class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <strong>Konfirmasi Password</strong>
                                    {!! Form::password('confirm-password', array('placeholder' => 'Masukkan Konfirmasi
                                    Password','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <strong>Role</strong>
                                    {!! Form::select('role_id', $roles,'Silahkan Pilih', array('class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6 text-left mt-4">
                                <a class="btn btn-sm btn-danger" href="{{ route('users.index') }}">Kembali</a>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
