@extends('template.header')
@section('content')
      <!-- Default box -->
      {{-- <div class="card">
        <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul>
            @foreach ($errorrs->any() as $error)
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
      @endif
      </div>
      </div> --}}
<div class="card">
  <div class="card-header">
    <button type="button" class="d-flex btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalInput">
      Tambah Data
    </button>
</div>
<div class="card-body">
        <table class="table " id="tbl-paket">
            <thead>
                <tr>
                    <th>No.</th>
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
              @foreach ($paket as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->id_outlet }}</td>
                  <td>{{ $item->jenis }}</td>
                  <td>{{ $item->nama_paket }}</td>
                  <td class="format-number">Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                  <td>
                    <div class="d-flex">
                    <button type="button" class="badge btn-primary" data-toggle="modal" data-target="#exampleModalUpdate{{ $item->id }}">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <form action="{{ route('paket.destroy', $item->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="button" class="badge btn-danger" onclick="deleteConfirmation(event)"><i class="bi bi-trash-fill"></i></button>
                    </form>
                  </div>
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
            <div class="form-floating mb-2">
                <div class="section-title mt-0">Id Outlet</div>
                    <div class="form-group">
                      <select id="id_outlet" name="id_outlet" class="custom-select">
                      <option selected>-- Pilih Id Outlet --</option>
                      @foreach ($outlet as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
              <div class="form-floating mb-2">
                <div class="section-title mt-0">Jenis</div>
                    <div class="form-group">
                      <select class="custom-select" id="jenis" name="jenis">
                        <option selected>-- Pilih Jenis Laundry --</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="lain">Lain</option>
                      </select>
                    </div>
                </div>
              <div class="form-floating mb-2">
                <label for="nama_paket">Nama</label>
                <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama">
              </div>
            <div class="form-floating mb-2">
              <label for="harga">Harga Paket</label>
              <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Paket">
            </div>
            <button class="w-100 btn btn-lg btn-primary swalDefaultpaketInput" type="submit">Tambah Paket</button>
        </form>
      </div>
    </div>
    </div>
</div>

{{-- Update --}}
@foreach ($paket as $item)
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
            <div class="mb-2 form-floating">
              <input type="hidden" class="form-control" id="id" name="id" value="{{ $item->id }}" readonly>
            </div>
            <div class="form-floating mb-2">
              <div class="section-title mt-0">Id Outlet</div>
                  <div class="form-group">
                    <select id="id_outlet" name="id_outlet" class="custom-select">
                    <option selected>-- Pilih Id Outlet --</option>
                    @foreach ($outlet as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
            </div>
          </div>
              <div class="form-floating mb-2">
                <div class="section-title mt-0">Jenis</div>
                    <div class="form-group">
                      <select class="custom-select" id="jenis" name="jenis">
                        <option selected>-- Pilih Jenis Laundry --</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="lain">Lain</option>
                      </select>
                    </div>
                </div>
              <div class="form-floating mb-2">
                <label for="nama_paket">Nama</label>
                <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama" value="{{ $item->nama_paket }}">
              </div>
            <div class="form-floating mb-2">
              <label for="harga">Harga Paket</label>
              <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Paket" value="{{ $item->harga }}">
            </div>
                <button class="w-100 btn btn-lg btn-primary swalDefaultpaketUpdate" type="submit">Update Paket</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

{{-- Delete --}}
{{-- @foreach ($data as $item)
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
@endforeach --}}

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
      if(result.value) {
        $(e.target.closest('form')).submit();
      }
    })
  }
</script>
    @if (session('success'))
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