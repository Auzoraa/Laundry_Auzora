@extends('template.header')
@section('content')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <form method="post" action="/transaksi/store">
        @csrf
        @include('transaksi.form')
        <input type="hidden" name="id_member" id="id_member">
    </form>
@endsection
@push('script')

@if (session('transSuccess'))
<script>
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
        });
        Toast.fire({
            icon: 'success',
            title: 'Transaksi berhasil dilakukan!!'
        });
    });
</script>
@endif
@endpush