@extends('template.header')
@section('content')

<section class="content-header">
    <div class="container-fluid"></div>
</section>
    
{{-- Main Content --}}
<section class="content">
  <ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
      <a class="nav-link" id="nav-data" data-toggle="collapse" href="#dataLaundry" role="button" aria-expanded="false" aria-controls="collapseExample">Data Laundry</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="nav-form" data-toggle="collapse" href="#formLaundry" role="button" aria-expanded="false" aria-controls="collapseExample">&nbsp;&nbsp;Cucian</a>
    </li>
  </ul>
  <div class="card" style="border-top: 0px">
    @if ($errors->any())
    <div class="card-body">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
          @foreach ($errors as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>
    </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert" id="success-alert">
          {{ session('seccess') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    <form method="post" action="{{ route('transaksi.store') }}">
      @csrf
      @include('transaksi.form')  
      @include('transaksi.data')
      <input type="hidden" name="id_member" id="id_member">
    </form>
  </div>
</section>

@endsection