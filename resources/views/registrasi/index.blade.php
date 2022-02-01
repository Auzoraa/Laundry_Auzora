<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Zra Laundry.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  {{-- bootstrap icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  {{-- data Table --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
  <div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('registrasi.store') }}" method="post">
              @csrf
                <h1 class="mb-3 fw-normal text-center">Daftar</h1>
                <div class="form-floating mb-3">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                  <label for="name">Nama</label>
                  @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" value="{{ old('username') }}">
                  <label for="username">Username</label>
                  @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
                </div>
                  <div class="form-floating mb-3">
                    <input type="text" name="id_outlet" class="form-control @error('id_outlet') is-invalid @enderror" id="id_outlet" placeholder="id_outlet" value="{{ old('id_outlet') }}">
                    <label for="id_outlet">Id Outlet</label>
                    @error('id_outlet')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <select name="role" id="role" value="{{ old('role') }}" class="form-select">
                      <option value="admin">Admin</option>
                      <option value="kasir">Kasir</option>
                      <option value="owner">Owner</option>
                    </select>
                    @error('role')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                      <label for="role">Role</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" value="{{ old('password') }}">
                    <label for="password">Password</label>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                  </div>
                  <button type="submit" class="w-100 btn btn-dark swalDefaultSuccess">
                    Daftar
                  </button>
                  <small class="d-block text-center mt-2">
                    Sudah punya akun? <a href="{{ route('login.index') }}">Masuk</a>  
                  </small>  
            </form>
        </div>
    </div>

  </div>
    
</body>
</html>