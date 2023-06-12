@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (\Session::has('booking_id'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('booking_id') !!}</li>
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb ">
            <div class="d-flex justify-content-center">
                <h4>PEMBAYARAN</h4>
            </div>
            <form action="{{ url('payment/create') }}" method="POST">
                @csrf                
                <input type="hidden" name="booking_id" class="form-control" value="{{ $booking_id }}" >                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                        <div class="form-group">
                            <strong>Metode Pembayaran:</strong>
                            <select type="text" class="form-select" id="jenis_pembayaran" name="jenis_pembayaran"
                                aria-label="Default select example" required>
                                <option value="OVO" selected>OVO</option>
                                <option value="Gopay" selected>Gopay</option>
                                <option value="Dana" selected>Dana</option>
                            </select>                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                        <div class="form-group">
                            <strong>Total Bayar:</strong>
                            <input type="number" name="total_bayar" class="form-control" value="{{ $jml_bayar }}" disabled>
                        </div>
                    </div>

                    <input type="hidden" name="total_bayar" class="form-control" value="{{ $jml_bayar }}">
                    
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button class="btn btn-primary" type="submit">Bayar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
