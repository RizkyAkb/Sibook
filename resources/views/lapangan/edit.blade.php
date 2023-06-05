@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Lapangan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lapangan.index') }}"> Back</a>
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


    <form action="{{ route('lapangan.update',$lapangan->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama Lapangan:</strong>
		            <input type="text" name="nama_lapangan" value="{{ $lapangan->nama_lapangan }}" class="form-control" placeholder="nama_lapangan">
		        </div>
		    </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Harga:</strong>
		            <input type="number" name="harga" value="{{ $lapangan->harga }}" class="form-control" placeholder="harga">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Status:</strong>
		            <input type="text" name="status" value="{{ $lapangan->status }}" class="form-control" placeholder="status">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection