@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Member Detail</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('users.update', auth()->id()) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" placeholder="user12345">                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="saldo" value=" {{ auth()->user()->username }}" class="form-control" placeholder="member123" disabled>                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Saldo:</strong>
                    <input type="text" name="saldo" value="{{ auth()->user()->memberDetail->saldo }}" class="form-control" placeholder="999000" disabled>                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Hari Main:</strong>
                    <input type="text" name="saldo" value="{{ auth()->user()->memberDetail->hari_main }}" class="form-control" placeholder="Senin/Selasa/Dll" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Sesi Mulai:</strong>
                    <input type="text" name="saldo" value="{{ $sesi_mulai['0']->nama_sesi }}" class="form-control" placeholder="08:00" disabled>                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Sesi Selesai:</strong>
                    <input type="text" name="saldo" value="{{ $sesi_selesai['0']->nama_sesi }}" class="form-control" placeholder="09:00" disabled>                
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 my-1">
                <div class="form-group">
                    <strong>Masa Berlaku:</strong>
                    <input type="text" name="saldo" value="{{ auth()->user()->memberDetail->masa_berlaku }}" class="form-control" placeholder="09:00" disabled>                
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6 my-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        
    </form>
    <div class="col-xs-12 col-sm-12 col-md-6 my-2">
        <button type="submit" class="btn btn-primary">Isi Saldo</button>
    </div>
    </div>
@endsection
