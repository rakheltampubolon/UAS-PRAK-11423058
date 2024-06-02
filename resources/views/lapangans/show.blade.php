@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Detail Lapangan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <strong>Nama:</strong>
                            {{ $lapangan->nama }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <strong>Alamat:</strong>
                            {{ $lapangan->alamat }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb mt-4">
                        <div class="text-left">
                            <a class="btn btn-sm btn-danger" href="{{ route('lapangans.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
