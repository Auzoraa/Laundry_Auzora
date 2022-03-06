@extends('template.header')
@section('content')
      <!-- Default box -->
<div class="card">
  <div class="card-header d-flex">
    <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#exampleModalInput">
        Tambah Data
    </button>
    <button type="button" id="btn-export-xls" class="d-flex btn btn-sm btn-success mr-1"><i class="bi bi-excel"
            style="color: rgb(1, 138, 92)"></i> Export Xls</button>
    <button type="button" class="d-flex btn btn-sm btn-danger"><i class="bi bi-print"
            style="color: rgb(40, 183, 250)"></i> Export Pdf</button>
    <button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#importExcel">
        Import Xls</button>
</div>
  <div class="card-body">
        <table class="table " id="tbl-barangInv">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Merk Barang</th>
                    <th>Qty</th>
                    <th>Kondisi</th>
                    <th>Tanggal Pengadaan</th>
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
                  <td>{{ $item->nama_barang }}</td>
                  <td>{{ $item->merk_barang }}</td>
                  <td>{{ $item->qty }}</td>
                  <td>{{ $item->kondisi }}</td>
                  <td>{{ $item->tanggal_pengadaan }}</td>
                  <td>
                    <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#exampleModalUpdate{{ $item->id }}">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <form action="{{ route('barangInv.destroy', $item->id) }}" method="POST">
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
  </div>
</div>
</div>

{{-- Input --}}
<div class="modal fade" id="exampleModalInput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('barangInv.store') }}">
            @csrf
                    <div class="mb-2">
                      <input type="hidden" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-floating mb-2">
                        <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    </div>
                    <div class="form-floating mb-2">
                        <label for="merk_barang">Merk Barang</label>
                      <input type="text" class="form-control" id="merk_barang" name="merk_barang">
                    </div>
                    <div class="form-floating mb-2">
                        <label for="qty">Qty</label>
                        <input type="number" class="form-control" id="qty" name="qty">
                      </div>
                    <div class="form-group mb-2">
                        <div class="section-title mt-0"><b>Kondisi</b></div>
                            <div class="form-group">
                              <select id="kondisi" name="kondisi" class="custom-select">
                              <option selected>-- Pilih Kondisi Barang --</option>
                              <option value="layak_pakai">Layak Pakai</option>
                              <option value="rusak_ringan">Rusak ringan</option>
                              <option value="rusak_baru">Rusak Baru</option>
                              </select>
                            </div>
                    </div>
                    <div class="form-floating mb-2">
                        <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
                      <input type="date" class="form-control" id="tanggal_pengadaan" name="tanggal_pengadaan" placeholder="Tanggal Pengadaan">
                      </div>
                    <button class="w-100 btn btn-lg btn-info swalDefaultbarangInvInput" type="submit">Tambah Barang</button>
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
          <h4 class="modal-title fw-normal" id="exampleModalLabel">Update Barang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('barangInv.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-2">
              <label for="id">No.</label>
              <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}" readonly>
            </div>
              <div class="form-floating mb-2">
                  <label for="nama_barang">Nama barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $item->nama_barang }}" >
              </div>
              <div class="form-floating mb-2">
                  <label for="merk_barang">Merk Barang</label>
                <input type="text" class="form-control" id="merk_barang" name="merk_barang" value="{{ $item->merk_barang }}">
              </div>
              <div class="form-floating mb-2">
                  <label for="merk_barang">Qty</label>
                <input type="text" class="form-control" id="qty" name="qty" value="{{ $item->qty }}">
              </div>
              <div class="form-group mb-2">
                <div class="section-title mt-0"><b>Kondisi</b></div>
                    <div class="form-group">
                      <select id="kondisi" name="kondisi" class="custom-select">
                      <option selected>-- Kondisi Barang --</option>
                      <option value="layak_pakai">Layak Pakai</option>
                      <option value="rusak_ringan">Rusak ringan</option>
                      <option value="rusak_baru">Rusak Baru</option>
                      </select>
                    </div>
            </div>
              {{-- <div class="form-floating mb-2">
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                  <option value="L">layak_pakai</option>
                      <option value="P">Perempuan</option>
                    </select>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
              </div> --}}
              <div class="form-floating mb-2">
                <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
                <input type="text" class="form-control" id="tanggal_pengadaan" name="tanggal_pengadaan" value="{{ $item->tanggal_pengadaan }}">
                </div>
                <button class="w-100 btn btn-lg btn-info swalDefaultbarangInvUpdate" type="submit">Update Barang</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

    <!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/barangInv/import_excel" enctype="multipart/form-data">
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
          <h4 class="modal-title fw-normal" id="labelDelete">Hapus barangInv</h4>
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
                  <form action="{{ route('barangInv.destroy', $item->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger swalDefaultbarangInvDelete">Hapus</button>
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
      if(result.value) {
        $(e.target.closest('form')).submit();
      }
    })
  }
</script>
    @if (session('barangInvInput'))
  <script>
    $(function(){
      $('#tbl-barangInv').DataTable();
      const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
          });
          Toast.fire({
              icon: 'success',
              title: 'Barang Inventaris Berhasil ditambahkan'
          });
    });
  </script>
      @endif

      @if (session('import'))
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
                  title: 'Import Berhasil'
              });
        });
      </script>
          @endif


      @if (session('barangInvUpdate'))
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
                  title: 'Barang Inventaris Berhasil diubah'
              });
        });
      </script>
          @endif

          @if (session('barangInvDelete'))
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
                      title: 'Barang Inventaris Berhasil dihapus'
                  });
            });
          </script>
              @endif
              <script>
      $('#btn-export-xls').on('click', function(e){
        window.location = "{{ url('barangInv/export/xls') }}";
      })
    </script>
@endpush
