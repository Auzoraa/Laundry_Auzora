@extends('template.header')
@section('content')
    
@endsection

@push('script')
  @if (session('loginBerhasil'))
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
              title: 'Login Berhasil'
          });
      });
  </script>
  @endif
  
  @if (session('loginError'))
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
              title: 'Login gagal!'
          });
      });
  </script>
  @endif
@endpush