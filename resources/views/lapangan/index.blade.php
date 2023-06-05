@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lapangan</h2>
            </div>
            <div class="pull-right">
                @can('lapangan-create')
                <a class="btn btn-success" href="{{ route('lapangan.create') }}"> Create New Lapangan</a>
                @endcan
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
            <th>Nama Lapangan</th>
            <th>Harga</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($lapangans as $lapangan)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $lapangan->nama_lapangan }}</td>
	        <td>{{ $lapangan->harga }}</td>
            <td>{{ $lapangan->status }}</td>
	        <td>
                <form action="{{ route('lapangan.destroy',$lapangan->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('lapangan.show',$lapangan->id) }}">Show</a>
                    @can('lapangan-edit')
                    <a class="btn btn-primary" href="{{ route('lapangan.edit',$lapangan->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('lapangan-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $lapangans->links() !!}

@endsection