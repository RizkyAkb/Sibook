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
            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <strong>Nama Pemesan:</strong>
                    <input type="text" name="nama_pemesan" class="form-control" placeholder="Futsal FC">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <strong>Tanggal Main:</strong>
                    <input type="date" name="tanggal_main" class="form-control" placeholder="" max="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <strong>Sesi Mulai:</strong>
                    <select type="text" class="form-select" id="sesi_mulai" name="sesi_mulai" aria-label="Default select example" required>                        
						<option value="1" selected>09:00</option>
						<option value="2" selected>10:00</option>
						<option value="3" selected>11:00</option>
						<option value="4" selected>12:00</option>
						<option value="5" selected>13:00</option>
						<option value="6" selected>14:00</option>
						<option value="7" selected>15:00</option>
						<option value="8" selected>16:00</option>
						<option value="9" selected>17:00</option>
						<option value="10" selected>18:00</option>
						<option value="11" selected>19:00</option>
						<option value="12" selected>20:00</option>
						<option value="13" selected>21:00</option>
						<option value="14" selected>22:00</option>
						<option value="15" selected>23:00</option>						
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <strong>Sesi Selesai:</strong>
                    <select type="text" class="form-select" id="sesi_selesai" name="sesi_selesai" aria-label="Default select example" required>                        
						<option value="1" selected>09:00</option>
						<option value="2" selected>10:00</option>
						<option value="3" selected>11:00</option>
						<option value="4" selected>12:00</option>
						<option value="5" selected>13:00</option>
						<option value="6" selected>14:00</option>
						<option value="7" selected>15:00</option>
						<option value="8" selected>16:00</option>
						<option value="9" selected>17:00</option>
						<option value="10" selected>18:00</option>
						<option value="11" selected>19:00</option>
						<option value="12" selected>20:00</option>
						<option value="13" selected>21:00</option>
						<option value="14" selected>22:00</option>
						<option value="15" selected>23:00</option>						
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <strong>No HP:</strong>
                    <input type="number" name="nohp" class="form-control" placeholder="08xxxxxxxxxx">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 my-1">
                <div class="form-group">
                    <strong>Lapangan:</strong>
                    <input type="number" name="id_lapangan" class="form-control" placeholder="">
                </div>
            </div>

            <input id="id_pemesan" type="hidden" name="id_pemesan" value="{{ random_int(100000, 999999) }}">
            <input id="status" type="hidden" name="status" value="Belum Bayar">

            <div class="col-xs-12 col-sm-12 col-md-12 my-2 text-center">
                <button type="submit" class="btn btn-primary">PESAN</button>
            </div>
        </div>


    </form>

@endsection
