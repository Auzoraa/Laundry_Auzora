@extends('template.header')
@section('content')
      <!-- Default box -->
<div class="card">
<div class="card-header">
    <h3 class="card-title">Member</h3>
</div>
<div class="card-body">
    <button type="button" class="btn btn-dark mt-1 mb-2 ms-1 " data-toggle="modal" data-target="#exampleModalInput">
        Tambah Data
      </button>
        <table class="table " id="tbl-member">
            <thead>
                <tr>
                    <th>ID</th>
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
                    <div class="mb-2">
                      <label for="nama">Nama Member</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Member">
                    </div>
                    <div class="mb-2">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="mb-2">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="tlp">No.Phone</label>
                        <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No.Phone">
                      </div>
                    <button class="w-100 btn btn-lg btn-dark swalDefaultmemberInput" type="submit">Tambah Member</button>
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
          <h4 class="modal-title fw-normal" id="exampleModalLabel">Update Member</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('member.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-2">
              <label for="id">No.</label>
              <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}" readonly>
            </div>
              <div class="mb-2">
                <label for="nama">Nama Member</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" >
              </div>
              <div class="mb-2">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $item->alamat }}">
              </div>
              <div class="mb-2">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select id="jenis_kelamin" name="jenis_kelamin">
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                  </select>
              </div>
              <div class="mb-2">
                  <label for="tlp">No.Phone</label>
                  <input type="text" class="form-control" id="tlp" name="tlp" placeholder="No.Phone" value="{{ $item->tlp }}">
                </div>
                <button class="w-100 btn btn-lg btn-dark swalDefaultmemberUpdate" type="submit">Update Member</button>
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
@endforeach
@push('script')
    @if (session('memberInput'))
  <script>
    $(function(){
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
        $(function(){
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
            $(function(){
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
@endpush
@endsection