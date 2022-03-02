@extends('template.header')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <button type="button" class="d-flex btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalInput">
                Tambah Data
            </button>
            <button type="button" id="btn-export-xls" class="d-flex btn btn-sm btn-success"><i class="bi bi-excel"
                    style="color: rgb(1, 138, 92)"></i> Export Xls</button>
            <button type="button" class="d-flex btn btn-sm btn-danger"><i class="bi bi-print"
                    style="color: rgb(40, 183, 250)"></i> Export Pdf</button>
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
                                    <button type="button" class="badge btn-primary" data-toggle="modal"
                                        data-target="#exampleModalUpdate{{ $item->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('member.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="badge btn-danger"
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
                        <div class="form-group mb-2">
                            <div class="section-title">Jenis Kelamin</div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="laki-laki" name="jenis_kelamin" class="custom-control-input"
                                    value="L">
                                <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input">
                                <label class="custom-control-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <label for="tlp">No.Phone</label>
                            <input type="text" class="form-control" id="tlp" name="tlp">
                        </div>
                        <button class="w-100 btn btn-lg btn-primary swalDefaultmemberInput" type="submit">Tambah
                            Member</button>
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
                                <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}"
                                    readonly>
                                <label for="id">No.</label>
                            </div>
                            <div class="form-floating mb-2">
                                <label for="nama">Nama Member</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $item->nama }}">
                            </div>
                            <div class="form-floating mb-2">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                                    value="{{ $item->alamat }}">
                            </div>
                            <div class="form-group mb-2"></div>
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L"
                                style="border:2px dotted #00f;background:#ff0000;">
                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P"
                            style="border:2px dotted #00f;background:#ff0000;">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
                {{-- <div class="form-floating mb-2">
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                  <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
              </div> --}}
                <div class="form-floating mb-2">
                    <label for="tlp">No.Phone</label>
                    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No.Phone"
                        value="{{ $item->tlp }}">
                </div>
                <button class="w-100 btn btn-lg btn-primary swalDefaultmemberUpdate" type="submit">Update Member</button>
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
      $('#btn-export-xls').on('click', function(e){
        window.location = "{{ url('member/export/xls') }}";
      })
    </script>
@endpush
