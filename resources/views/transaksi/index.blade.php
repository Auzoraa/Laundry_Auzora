@extends('template.header')
@section('content')
    <form method="post" action="{{ route('transaksi.store') }}">
        @csrf
        @include('transaksi.form')
        <input type="hidden" name="id_member" id="id_member">
    </form>
@endsection
