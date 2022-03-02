<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Zra Laundry. | {{ $title }}</title>
  <link rel="icon" href="{{ asset('img') }}/laundry-machine(1).png" type="image/png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('assets') }}/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/node_modules/summernote/dist/summernote-bs4.css">
  {{-- bootstrap icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  {{-- data table --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css"/>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets') }}/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets') }}/toastr/toastr.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          @auth
            <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-right"></i> </button>
              </form>
            </li>         
        @endauth
        </ul>
      </nav>
  {{-- 
  <style>
    .sidebar-brand {
      font-family: 'Kristen ITC', serif;
      text-decoration: none;
    }
      aside{
        background-color: aquamarine;
      }
      a{
        text-decoration: none;
      }
  </style> --}}

  <!-- Main Sidebar Container -->
  @include('template.sidebar')

  <!-- /.content-wrapper -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{ $title }}</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/home">Home</a></div>
            <div class="breadcrumb-item active"><a href="#">{{ $title }}</a></div>
        </div>
      </div>
        @yield('content')
      <div class="section-body">
      </div>
    </section>
  </div>
  {{-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer> --}}

@include('template.footer')
</body>
</html>
