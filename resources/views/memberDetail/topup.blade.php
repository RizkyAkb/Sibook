@extends('layouts.app')
@section('content')
<form action="{{ url('member/topup')}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="number" name="saldo" class="form-control" placeholder="999000" value="" min="0">
    <button class="btn btn-primary my-2" type="submit">TOP UP DEPOSIT</button>
</form>
@endsection
