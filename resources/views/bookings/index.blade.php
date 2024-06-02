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
                        <h5 class="h3 mb-0">Data Booking</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Auth::user()->role_id == 3)
                <div class="row mb-3">
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-sm btn-success" href="{{ route('bookings.create') }}">Tambah Booking
                            Baru</a>
                    </div>
                </div>
                @endif
                <table class="table table-bordered" style="width: 100%">
                    <tr class="text-center text-uppercase">
                        <th width="20px">No</th>
                        <th>Lapangan</th>
                        <th>Pengguna</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Status</th>
                        <th width="200px">Aksi</th>
                    </tr>
                    @foreach ($bookings as $booking)
                    <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td>{{ $booking->lapangan->nama }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->start_time }}</td>
                        <td>{{ $booking->end_time }}</td>
                        <td>
                            @if ($booking->status == 'PENDING')
                            <label class="badge badge-info">PENDING</label>
                            @elseif($booking->status == 'APPROVED')
                            <label class="badge badge-success">APPROVED</label>
                            @elseif($booking->status == 'REJECTED')
                            <label class="badge badge-danger">REJECTED</label>
                            @endif
                        </td>
                        <td>
                            @if (Auth::user()->role_id == 3)
                            <form action="{{ route('bookings.destroy',$booking->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('bookings.show',$booking->id) }}">Detail</a>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('bookings.edit',$booking->id) }}">Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                            @elseif(Auth::user()->role_id == 2)
                            <form action="{{ route('bookings.approve', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Kamu Yakin?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-success" value="APPROVE" {{  $booking['status'] == 'APPROVED'  ? 'disabled' : '' }}>
                                    </form>
                                    <form action="{{ route('bookings.reject', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Kamu Yakin?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="REJECT" {{ $booking['status'] == 'REJECTED' ? 'disabled' : '' }}>
                                    </form>
                            @endif
                            
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

{!! $bookings->links() !!}

@endsection
