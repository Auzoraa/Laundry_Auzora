@extends('template.header')
@section('content')
      <!-- Default box -->
<div class="card">
  <div class="card-header">
    <button type="button" class="d-flex btn btn-sm btn-dark" data-toggle="modal" data-target="#exampleModalInput">
      Tambah Data
    </button>
    <div class="card-tools" style="margin-top: -20px">
      <!-- Maximize Button -->
      <button type="button" class="btn btn-tool d-flex ms-auto" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
</div>
<div class="card-body">
    <div class="table-stats order-table ov-h">
        <table class="table " id="tbl-outlet">
            <thead>
                <tr>
                    <th>No.</th>
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
                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['outlet.destroy', $item->id],'style'=>'display:inline']) !!}
                      <button onclick="
                      swal({
                        title: 'Esta seguro de realizar esta Acción?',
                        text: 'Si procede este usuario será eliminado!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Eliminar!',
                        cancelButtonText: 'Cancelar',
                        closeOnConfirm: false,
                        closeOnCancel: false
                      },
                      function(){
                        swal('Usuario eliminado!', 'Este usuario fue eliminado de nuestros registros.', 'success');
                      });"
                        class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar usuario"> <i class="material-icons">delete</i> 
                      </button>
                      {!! Form::close() !!} --}}
                    {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalDelete{{ $item->id }}">
                      <i class="bi bi-trash-fill"></i>
                    </button> --}}
                    <div class="d-flex">
                    <button type="button" class="badge btn-success" data-toggle="modal" data-target="#exampleModalUpdate{{ $item->id }}">
                      <i class="bi bi-pencil-square"></i>
                    </button>|
                    <form action="{{ route('outlet.destroy', $item->id) }}" method="POST">
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
                    <div class="form-floating mb-2">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Outlet">
                      <label for="nama">Nama Outlet</label>
                    </div>
                    <div class="form-floating mb-2">
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                      <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-2">
                      <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No.Phone">
                      <label for="tlp">No.Phone</label>
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
            <div class="form-floating mb-2">
              <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}" readonly>
              <label for="id">No.</label>
            </div>
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" >
                <label for="nama">Nama Outlet</label>
              </div>
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $item->alamat }}">
                <label for="alamat">Alamat</label>
              </div>
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No.Phone" value="{{ $item->tlp }}">
                <label for="tlp">No.Phone</label>
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