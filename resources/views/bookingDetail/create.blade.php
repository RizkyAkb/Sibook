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
            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Nama Pemesan:</strong>
                    <input type="text" name="nama_pemesan" class="form-control" placeholder="Futsal FC" value="{{ old('nama_pemesan') }}">                    
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Tanggal Main:</strong>
                    <input type="date" name="tanggal_main" class="form-control" placeholder="" min="{{ date('Y-m-d') }}" value="{{ old('tanggal_main') }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Sesi Mulai:</strong>
                    <select type="text" class="form-select" id="sesi_mulai" name="sesi_mulai"
                        aria-label="Default select example" required>
                        {{-- BookingController, Ambil pilihan/option dari table sesi_lists --}}
                        @foreach ($sesi as $ss)
                            @if (old('sesi_mulai') == $ss->id)
                                <option value="{{ $ss->id }}" selected>{{ $ss->nama_sesi }}</option>
                            @else
                                <option value="{{ $ss->id }}">{{ $ss->nama_sesi }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Sesi Selesai:</strong>
                    <select type="text" class="form-select" id="sesi_selesai" name="sesi_selesai"
                        aria-label="Default select example" required>
                        {{-- BookingController, Ambil pilihan/option dari table sesi_lists --}}
                        @foreach ($sesi as $ss)
                            @if (old('sesi_mulai') == $ss->id)
                                <option value="{{ $ss->id }}" selected>{{ $ss->nama_sesi }}</option>
                            @else
                                <option value="{{ $ss->id }}">{{ $ss->nama_sesi }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>No HP:</strong>
                    <input type="number" name="nohp" class="form-control" placeholder="08xxxxxxxxxx">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Lapangan:</strong>
                    {{-- BookingController, Ambil pilihan/option dari table lapangans --}}
                    <select type="text" class="form-select" id="id_lapangan" name="id_lapangan"
                        aria-label="Default select example" required>
                        @foreach ($optLapangan as $ol)
                            @if (old('id_lapangan') == $ol->id)
                                <option value="{{ $ol->id }}" selected>{{ $ol->nama_lapangan }}</option>
                            @else
                                <option value="{{ $ol->id }}">{{ $ol->nama_lapangan }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <input id="id_pemesan" type="hidden" name="id_pemesan" value="{{ random_int(100000, 999999) }}">
            <input id="status" type="hidden" name="status" value="Belum Bayar">

            <div class="my-3"><strong>Sub Total: </strong>Rp.
                @foreach ($optLapangan as $ol)
                    {{ $ol->harga }}
                @endforeach
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-2 text-center">
                <button type="submit" class="btn btn-primary">PESAN</button>
            </div>
        </div>


    </form>

@endsection
