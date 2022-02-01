@extends('template.header')
@section('content')
      <!-- Default box -->
<div class="card">
<div class="card-header">
    <h3 class="card-title justify-content-center"><b>Outlet</b></h3>
</div>
<div class="card-body">
    <button type="button" class="btn btn-dark mb-2 ms-auto" data-toggle="modal" data-target="#exampleModalInput">
        Tambah Data
      </button>
    <div class="table-stats order-table ov-h">
        <table class="table " id="tbl-outlet">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No.Phone</th>
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
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->tlp }}</td>
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
    </div> <!-- /.table-stats -->
</div>
</div>
</div>

{{-- Input --}}
<div class="modal fade" id="exampleModalInput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Outlet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('outlet.store') }}">
            @csrf
                    <div class="mb-2">
                      <input type="hidden" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-2">
                      <label for="nama">Nama Outlet</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Outlet">
                    </div>
                    <div class="mb-2">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="mb-2">
                        <label for="tlp">No.Phone</label>
                        <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No.Phone">
                      </div>
                    <button class="w-100 btn btn-lg btn-dark swalDefaultoutletInput" type="submit">Tambah Outlet</button>
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
          <h4 class="modal-title fw-normal" id="exampleModalLabel">Update Outlet</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('outlet.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-2">
              <label for="id">No.</label>
              <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}" readonly>
            </div>
              <div class="mb-2">
                <label for="nama">Nama Outlet</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" >
              </div>
              <div class="mb-2">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $item->alamat }}">
              </div>
              <div class="mb-2">
                  <label for="tlp">No.Phone</label>
                  <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No.Phone" value="{{ $item->tlp }}">
                </div>
                <button class="w-100 btn btn-lg btn-dark swalDefaultoutletUpdate" type="submit">Update Outlet</button>
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
          <h4 class="modal-title fw-normal" id="labelDelete">Hapus Outlet</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
              <div class="mb-2">
                <h5>Apakah anda yakin ingin menghapus? {{ $item->nama }}</h5>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form action="{{ route('outlet.destroy', $item->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger swalDefaultoutletDelete">Hapus</button>
                  </form>
                </div>
                </div>
        </div>
      </div>
    </div>
  </div>
@endforeach

@push('script')
    @if (session('outletInput'))
  <script>
    $(function(){
      $('#tbl-outlet').DataTable();
      const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
          });
          Toast.fire({
              icon: 'success',
              title: 'Outlet Berhasil ditambahkan'
          });
    });
  </script>
      @endif

      @if (session('outletUpdate'))
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
                  title: 'Outlet Berhasil diubah'
              });
        });
      </script>
          @endif

          @if (session('outletDelete'))
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
                      title: 'Outlet Berhasil dihapus'
                  });
            });
          </script>
              @endif
@endpush
@endsection