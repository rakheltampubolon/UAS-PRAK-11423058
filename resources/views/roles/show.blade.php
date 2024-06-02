@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Detail Role</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <strong>Role</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <strong>Permissions</strong>
                            @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                            <label class="badge badge-primary">{{ $v->name }},</label>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb mt-4">
                        <div class="text-left">
                            <a class="btn btn-sm btn-danger" href="{{ route('roles.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
