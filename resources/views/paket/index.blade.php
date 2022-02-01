@extends('template.header')
@section('content')
      <!-- Default box -->
<div class="card">
<div class="card-header">
    <h3 class="card-title">Paket</h3>
</div>
<div class="card-body">
    <button type="button" class="btn btn-dark mt-1 mb-2 ms-1" data-toggle="modal" data-target="#exampleModalInput">
        Tambah Data
      </button>
        <table class="table " id="tbl-paket">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Id Outlet</th>
                    <th>Jenis</th>
                    <th>Nama</th>
                    <th>Harga</th>
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
                  <td>{{ $item->id_outlet }}</td>
                  <td>{{ $item->jenis }}</td>
                  <td>{{ $item->nama_paket }}</td>
                  <td>{{ $item->harga }}</td>
                  <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalDelete{{ $item->id }}">
                      <i class="bi bi-trash-fill"></i>
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalUpdate{{ $item->id }}">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
</div>
</div>
</div>

{{-- Input --}}
<div class="modal fade" id="exampleModalInput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('paket.store') }}">
            @csrf
                    <div class="mb-2">
                      <input type="hidden" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-2">
                        <label for="id_outlet">Id Outlet</label>
                        <input type="text" class="form-control" id="id_outlet" name="id_outlet" placeholder="Id Outlet">
                      </div>
                      <div class="mb-2">
                          <label for="jenis">Jenis</label>
                          <select id="jenis" name="jenis">
                            <option value="kiloan">Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="bed_cover">Bed Cover</option>
                            <option value="lain">Lain</option>
                          </select>
                      </div>
                      <div class="mb-2">
                        <label for="nama_paket">Nama</label>
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama">
                      </div>
                    <div class="mb-2">
                      <label for="harga">Harga Paket</label>
                      <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Paket">
                    </div>
                    <button class="w-100 btn btn-lg btn-dark swalDefaultpaketInput" type="submit">Tambah Paket</button>
                </form>
              </div>
            </div>
    </div>
</div>

{{-- Update --}}
@foreach ($data as $item)
  <div class="modal fade" id="exampleModalUpdate{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-normal" id="exampleModalLabel">Update Paket</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('paket.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-2">
              <label for="id">No.</label>
              <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}" readonly>
            </div>
            <div class="mb-2">
                <label for="id_outlet">Id Outlet</label>
                <input type="text" class="form-control" id="id_outlet" name="id_outlet" placeholder="Id Outlet" value="{{ $item->id_outlet }}">
              </div>
              <div class="mb-2">
                  <label for="jenis">Jenis</label>
                  <select id="jenis" name="jenis">
                    <option value="kiloan">Kiloan</option>
                    <option value="selimut">Selimut</option>
                    <option value="bed_cover">Bed Cover</option>
                    <option value="lain">Lain</option>
                  </select>
              </div>
              <div class="mb-2">
                <label for="nama_paket">Nama</label>
                <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama" value="{{ $item->nama_paket }}">
              </div>
            <div class="mb-2">
              <label for="harga">Harga Paket</label>
              <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Paket" value="{{ $item->harga }}">
            </div>
                <button class="w-100 btn btn-lg btn-dark swalDefaultpaketUpdate" type="submit">Update Paket</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

{{-- Delete --}}
@foreach ($data as $item)
  <div class="modal fade" id="exampleModalDelete{{ $item->id }}" tabindex="-1" aria-labelledby="labelDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-normal" id="labelDelete">Hapus Paket</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
              <div class="mb-2">
                <h5>Apakah anda yakin ingin menghapus? {{ $item->nama_paket }}</h5>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form action="{{ route('paket.destroy', $item->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger swalDefaultpaketDelete">Hapus</button>
                  </form>
                </div>
                </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
@push('script')
    @if (session('paketInput'))
  <script>
    $(function(){
      $('#tbl-paket').DataTable();
      const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
          });
          Toast.fire({
              icon: 'success',
              title: 'Paket Berhasil ditambahkan'
          });
    });
  </script>
      @endif

      @if (session('paketUpdate'))
      <script>
        $(function(){
          const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
              });
              Toast.fire({
                  icon: 'success',
                  title: 'Paket Berhasil diubah'
              });
        });
      </script>
          @endif

          @if (session('paketDelete'))
          <script>
            $(function(){
              const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                  });
                  Toast.fire({
                      icon: 'success',
                      title: 'Paket Berhasil dihapus'
                  });
            });
          </script>
              @endif
@endpush
@endsection