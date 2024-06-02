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
                        <h5 class="h3 mb-0">Tambah Booking</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Lapangan</strong>
                                        <select class="form-control" name="lapangan_id">
                                        <option value="">Silahkan Pilih</option>
                                            @foreach ($lapangans as $lapangan)
                                            <option value="{{$lapangan->id}}">{{ $lapangan->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Jam Mulai</strong>
                                        <input type="time" name="start_time" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Jam Selesai</strong>
                                        <input type="time" name="end_time" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Catatan</strong>
                                        <textarea class="form-control" style="height:100px" name="notes"
                                            placeholder="Masukkan Catatan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 text-left mt-4">
                                    <a class="btn btn-sm btn-danger" href="{{ route('bookings.index') }}">Kembali</a>
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
