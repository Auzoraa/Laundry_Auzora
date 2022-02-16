@extends('template.header')
@section('content')

<section class="container">
    <div class="container-fluid">

    </div>
</section>
    
<section class="content">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" id="nav-data" data-toggle="collapse" aria-current="page" href="#dataLaundry" role="button" aria-expanded="false" aria-controls="collapseExample">Data Laundry</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="nav-data" data-toggle="collapse" aria-current="page" href="#formLaundry" role="button" aria-expanded="false" aria-controls="collapseExample">Cucian</a>
    </li>
  </ul>
  <div class="car" style="border-top: 0px">
    @include('transaksi.form')  
    @include('transaksi.data')
  </div>
</section>

@endsection
