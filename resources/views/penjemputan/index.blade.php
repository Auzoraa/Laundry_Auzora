@extends('template.header')
@section('content')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
      <!-- Default box -->
<div class="card">
  <div class="card-header d-flex">
    <button type="button" class="btn btn-info mr-1" data-toggle="modal" data-target="#exampleModalInput">
        Tambah Data
    </button>
    <button type="button" id="btn-export-xls" class="d-flex btn btn-success mr-1"><i class="bi bi-excel"
            style="color: rgb(1, 138, 92)"></i> Export Xls</button>
    <button type="button" class="d-flex btn btn-danger"><i class="bi bi-print"
            style="color: rgb(40, 183, 250)"></i> Export Pdf</button>
    <button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#importExcel"><i class="fas fa-file-excel"></i> Import Xls</button>
</div>
<div class="card-body">
    <div class="table-stats order-table ov-h">
        <table class="table " id="tbl-outlet">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No.Phone</th>
                    <th>Petugas Penjemputan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                ?>
              @foreach ($penjemputan as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->tlp }}</td>
                  <td>{{ $item->petugas }}</td>
                  <td>
                    <form action="{{ route('penjemputan.update', $item->id) }}"
                        method="POST" enctype="multipart/form-data" class="d-inline"
                        id="status{{ $item->id }}">
                    @csrf
                    @method('PATCH')
                    <div class="input-group input-group-outline ms-2">
                        <input type="hidden" name="id_member"
                            value="{{ old('id_member') ? old('id_member') : $item->id_member }}">
                        <input type="hidden" name="petugas"
                            value="{{ old('petugas') ? old('petugas') : $item->petugas }}">
                        <select name="status" id="ubah_status{{ $item->id }}"
                            class="form-control" onchange="$('#status{{ $item->id }}').submit();">
                            <option selected
                                value="{{ old('status') ? old('status') : $item->status }}">
                                {{ $item->status }} (Sekarang)</option>
                            <option value="tercatat"> Tercatat </option>
                            <option value="penjemputan"> Penjemputan </option>
                            <option value="selesai"> Selesai </option>
                        </select>
                        @error('status')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    </form>
            </td>
                  <td>
                    <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#exampleModalUpdate{{ $item->id }}">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <form action="{{ route('penjemputan.destroy', $item->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="button" class="btn btn-sm btn-danger" onclick="deleteConfirmation(event)"><i class="bi bi-trash-fill"></i></button>
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
          <form method="POST" action="{{ route('penjemputan.store') }}">
            @csrf
                    <div class="mb-2">
                      <input type="hidden" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-2">
                        <label for="id_member">Nama Pelanggan</label>
                        <div class="form-group">
                            <select id="id_member" name="id_member" class="custom-select">
                                @foreach ($member as $item)
                                    <option selected value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="petugas">Petugas Penjemputan</label>
                        <input type="text" class="form-control" id="petugas" name="petugas" placeholder="Auzora">
                      </div>
                      <div class="mb-2">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="custom-select">
                                <option value="tercatat">Tercatat</option>
                                <option value="penjemputan">Penjemputan</option>
                                <option value="selesai">Selesai</option>
                        </select>
                      </div>
                    <button class="w-100 btn btn-lg btn-info swalDefaultpenjemputanInput" type="submit">Tambah data</button>
                </form>
              </div>
            </div>
    </div>
</div>

{{-- Update --}}
@foreach ($penjemputan as $item)
<div class="modal fade" id="exampleModalUpdate{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update data penjemputan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('penjemputan.update', $item->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="mb-2">
            <label for="id">No.</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}" readonly>
          </div>
          <div class="mb-2">
            <label for="id_member">Nama Pelanggan</label>
            <div class="form-group">
                <select id="id_member" name="id_member" class="custom-select">
                    @foreach ($member as $item)
                        <option selected value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-2">
            <label for="petugas">Petugas Penjemputan</label>
            <input type="text" class="form-control" id="petugas" name="petugas" placeholder="Auzora" value="{{ old('petugas') ? old('petugas') : $item->petugas }}">
          </div>
          <div class="mb-2">
            <label for="status">Status</label>
            <select id="status" name="status" class="custom-select">
                <option selected value="{{ old('status') ? old('status') : $item->status }}">
                    <option value="tercatat">Tercatat</option>
                    <option value="penjemputan">Penjemputan</option>
                    <option value="selesai">Selesai</option>
            </select>
          </div>
              <button class="w-100 btn btn-lg btn-info swalDefaultpenjemputanUpdate" type="submit">Update data penjemputan</button>
        </form>
            </div>
          </div>
  </div>
</div>
@endforeach
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="/penjemputan/import_excel" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info swalDefaultimport">Import</button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection
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
@if (session('penjemputanInput'))
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
                title: 'Paket Berhasil ditambahkan'
            });
        });
    </script>
@endif

@if (session('penjemputanUpdate'))
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
                title: 'Data penjemputan Berhasil diubah'
            });
        });
    </script>
@endif
@if (session('import'))
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
                title: 'Import data penjemputan Berhasil'
            });
        });
    </script>
@endif

@if (session('penjemputanDelete'))
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
                title: 'Data penjemputan Berhasil dihapus'
            });
        });
    </script>
@endif
<script>
    $('#btn-export-xls').on('click', function(e) {
        window.location = "{{ url('penjemputan/export/xls') }}";
    })
</script>
<script>
    $('#ubah_status{{ $item->id }}').change(function() {
        $('#status{{ $item->id }}').submit();
    });
    </script>
@endpush