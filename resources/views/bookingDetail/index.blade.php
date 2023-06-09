@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pemesanan</h2>
            </div>            
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            {{-- Jika id_pemesan ada di tabel User, ambil nama dari tabel User --}}
            <th>Nama Pemesan</th>
            {{-- ----- --}}
            <th>Tanggal Main</th>
            <th>Sesi Mulai</th>
            <th>Sesi Selesai</th>
            {{-- Ambil dari tabel bookingdetails --}}
            <th>Jenis Pembayaran</th>             
            <th>Total Bayar</th>            
            {{-- ---- --}}
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($bookings as $booking)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $booking->nama_pemesan }}</td>
	        <td>{{ $booking->tanggal_main }}</td>
            <td>{{ $booking->sesi_mulai }}</td>
            <td>{{ $booking->sesi_selesai }}</td>
            <td>{{ $booking->bookingDetail->jenis_pembayaran }}</td>
            <td>{{ $booking->bookingDetail->total_bayar }}</td>
            <td>{{ $booking->status }}</td>
	        <td>                
                <a class="btn btn-info" href="booking/{{$booking->id}}">Show</a>                
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $bookings->links() !!}

@endsection