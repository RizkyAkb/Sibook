@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb ">
            <div class="d-flex justify-content-center">
                <h4>PEMBAYARAN</h4>
            </div>
            <div class="d-flex justify-content-center my-3">
                <a class="btn btn-primary" href="{{ url('/') }}">Lihat Jadwal</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
@endsection
