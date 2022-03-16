@extends('template.header')
@section('content')
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#exampleModalInput">
      Tambah User
  </button>
  </div>
  <div class="card-body">
    <!-- Default box -->
    <table class="table " id="tbl-paket">
      <thead>
          <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Id Outlet</th>
              <th>Role</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $no = 1;
          ?>
          @foreach ($data as $item)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->id_outlet }}</td>
                  <td>{{ $item->role }}</td>
                  <td>
                      <div class="d-flex">
                          <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button type="button" class="btn btn-danger btn-sm"
                                  onclick="deleteConfirmation(event)"><i class="bi bi-trash-fill"></i></button>
                          </form>
                      </div>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>

</div>
</div>
    {{-- Input --}}
    <div class="modal fade" id="exampleModalInput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="" id="exampleModalLabel">Daftar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('user.store') }}" method="post">
                    @csrf
                      <div class="form-floating mb-3">
                        <label for="name">Nama</label>
                        @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Auzora" value="{{ old('name') }}">
                      </div>
                      <div class="form-floating mb-3">
                        <label for="email">Email</label>
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Auzoraaa@gmail.com" value="{{ old('email') }}">
                      </div>
                        <div class="form-floating mb-3">
                          <label for="id_outlet">Id Outlet</label>
                          @error('id_outlet')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                          <input type="text" name="id_outlet" class="form-control @error('id_outlet') is-invalid @enderror" id="id_outlet" placeholder="12112" value="{{ old('id_outlet') }}">
                        </div>
                        <div class="form-floating mb-3">
                          <div class="section-title mt-0"><b>Role</b></div>
                              <div class="form-group">
                                <select id="role" name="role" class="custom-select" value="{{ old('role') }}">
                                <option selected>-- Mohon Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                                <option value="owner">Owner</option>
                                </select>
                              </div>
                          @error('role')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                          <label for="password">Password</label>
                          @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="******" value="{{ old('password') }}">
                        </div>
                        <button type="submit" class="w-100 btn btn-dark swalDefaultSuccess">
                          Daftar
                        </button> 
                  </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Update --}}
    @foreach ($data as $item)
        <div class="modal fade" id="exampleModalUpdate{{ $item->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fw-normal" id="exampleModalLabel">Update User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('user.edit', $item->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                          <div class="form-floating mb-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ $item->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                          </div>
                          <div class="form-floating mb-3">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{ $item->email }}">
                            @error('email')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                          </div>
                            <div class="form-floating mb-3">
                              <label for="id_outlet">Id Outlet</label>
                              <input type="text" name="id_outlet" class="form-control @error('id_outlet') is-invalid @enderror" id="id_outlet" placeholder="id_outlet" value="{{ $item->id_outlet }}">
                              @error('id_outlet')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-floating mb-3">
                              <div class="section-title mt-0"><b>Role</b></div>
                                  <div class="form-group">
                                    <select id="role" name="role" class="custom-select" value="{{ old('role') }}"">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="owner">Owner</option>
                                    </select>
                                  </div>
                              @error('role')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" {{ $item->password }}">
                              @error('password')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <button type="submit" class="w-100 btn btn-dark swalDefaultSuccess">
                              Update user
                            </button> 
                      </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('script')
        <script>
            function deleteConfirmation(e) {
                e.preventDefault()
                Swal.fire({
                    title: 'Peringatan !!!',
                    icon: 'warning',
                    text: 'Apakah anda yakin ingin menghapus?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $(e.target.closest('form')).submit();
                    }
                })
            }
        </script>
        @if (session('userInput'))
            <script>
                $(function() {
                    $('#tbl-user').DataTable();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'user Berhasil ditambahkan'
                    });
                });
            </script>
        @endif

        @if (session('userUpdate'))
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
                        title: 'user Berhasil diubah'
                    });
                });
            </script>
        @endif

        @if (session('userDelete'))
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
                        title: 'user Berhasil dihapus'
                    });
                });
            </script>
        @endif
    @endpush
@endsection
