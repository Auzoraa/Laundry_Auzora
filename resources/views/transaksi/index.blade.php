@extends('template.header')
@section('content')
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
            title: 'Transaksi berhasil dilakukan'
        });
    });
</script>
@endif
@endpush