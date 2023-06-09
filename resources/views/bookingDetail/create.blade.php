@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Form Pemesanan</h2>
            </div>
            <div class="pull-right my-3">
                <a class="btn btn-primary" href="{{ url('/') }}">Lihat Jadwal</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ url('booking/create') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama Pemesan:</strong>
		            <input type="text" name="nama_pemesan" class="form-control" placeholder="Futsal FC">
		        </div>
		    </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Sesi Mulai:</strong>
		            <input type="number" name="sesi_mulai" class="form-control" placeholder="">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Sesi Selesai:</strong>
		            <input type="number" name="sesi_selesai" class="form-control" placeholder="">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>No HP:</strong>
		            <input type="number" name="nohp" class="form-control" placeholder="08xxxxxxxxxx">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Lapangan:</strong>
		            <input type="number" name="id_lapangan" class="form-control" placeholder="">
		        </div>
		    </div>

            
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">PESAN</button>
		    </div>
		</div>


    </form>

@endsection