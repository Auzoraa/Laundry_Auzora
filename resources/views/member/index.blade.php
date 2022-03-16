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
                <button type="button" id="btn-export-xls" class="d-flex btn btn-success mr-1">Export Xls</button>
                <a href="/member/cetak_pdf" target="_blank" rel="noopener noreferrer" class="btn btn-danger">Pdf</a>
                <button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#importExcel"><i class="fas fa-file-excel"></i> Import Xls</button>
            </div>
        <div class="card-body">
            <table class="table " id="tbl-member">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
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
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tlp }}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal"
                                        data-target="#exampleModalUpdate{{ $item->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('member.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-danger"
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
    </div>

    {{-- Input --}}
    <div class="modal fade" id="exampleModalInput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('member.store') }}">
                        @csrf
                        <div class="mb-2">
                            <input type="hidden" class="form-control" id="id" name="id">
                        </div>
                        <div class="form-floating mb-2">
                            <label for="nama">Nama Member</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-floating mb-2">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="mb-2">
                            <div class="section-title mt-0"><b>Jenis Kelamin</b></div>
                                <div class="form-group">
                                  <select id="jenis_kelamin" name="jenis_kelamin" class="custom-select">
                                  <option selected>-- Mohon pilih jenis kelamin --</option>
                                  <option value="L">Laki-laki</option>
                                  <option value="P">Perempuan</option>
                                  </select>
                                </div>
                        </div>  
                        <div class="form-floating mb-2">
                            <label for="tlp">No.Phone</label>
                            <input type="text" class="form-control" id="tlp" name="tlp">
                        </div>
                        <button class="w-100 btn btn-lg btn-info swalDefaultmemberInput" type="submit">Tambah
                            Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($data as $item)
        <div class="modal fade" id="exampleModalUpdate{{ $item->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fw-normal" id="exampleModalLabel">Update Member</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('member.update', $item->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-2">
                                <label for="id">No.</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}"
                                    readonly>
                            </div>
                            <div class="mb-2">
                                <label for="nama">Nama Member</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $item->nama }}">
                            </div>
                            <div class="mb-2">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                                    value="{{ $item->alamat }}">
                            </div>
                            <div class="mb-2">
                                <div class="section-title mt-0"><b>Jenis Kelamin</b></div>
                                    <div class="form-group">
                                      <select id="jenis_kelamin" name="jenis_kelamin" class="custom-select">
                                      <option selected>-- Mohon pilih jenis kelamin --</option>
                                      <option value="L">Laki-laki</option>
                                      <option value="P">Perempuan</option>
                                      </select>
                                    </div>
                            </div>
                            <div class="mb-2"><label for="tlp">No.Phone</label>
                                <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No.Phone"
                                    value="{{ $item->tlp }}">
                            </div>
                            <button class="w-100 btn btn-lg btn-info swalDefaultpaketUpdate" type="submit">Update
                                Member</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Import Excel -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="/member/import_excel" enctype="multipart/form-data">
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

    {{-- Delete --}}
    {{-- @foreach ($data as $item)
  <div class="modal fade" id="exampleModalDelete{{ $item->id }}" tabindex="-1" aria-labelledby="labelDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-normal" id="labelDelete">Hapus Member</h4>
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
                  <form action="{{ route('member.destroy', $item->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger swalDefaultmemberDelete">Hapus</button>
                  </form>
                </div>
                </div>
        </div>
      </div>
    </div>
  </div>
@endforeach --}}
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
    @if (session('memberInput'))
        <script>
            $(function() {
                $('#tbl-member').DataTable();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Member Berhasil ditambahkan'
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
                    title: 'Import Berhasil'
                });
            });
        </script>
    @endif

    @if (session('memberUpdate'))
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
                    title: 'Member Berhasil diubah'
                });
            });
        </script>
    @endif
    @if (session('memberDelete'))
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
                    title: 'Member Berhasil dihapus'
                });
            });
        </script>
    @endif
    <script>
        $('#btn-export-xls').on('click', function(e) {
            window.location = "{{ url('member/export/xls') }}";
        })
        $('#btn-export-pdf').on('click', function(e) {
            window.location = "{{ url('member/cetak_pdf') }}";
        })
    </script>
@endpush
