@extends('template/header')

{{-- menambahkan css --}}
@push('style')
    
@endpush

{{-- menyisipkan konten --}}
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar</h3>
    </div>
    <div class="card-body">
        <form action="post" action="siswa">
          @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" for="nis">Nis</label>
                <input type="text" name="nis"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" for="kelas">Jenis Kelamin</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="l">
                  <label class="form-check-label">
                    Laki-laki
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="p">
                  <label class="form-check-label">
                    Perempuan
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" for="kelas">Kelas</label>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Kelas</option>
                  <option value="1">XII RPL 1</option>
                  <option value="2">XII RPL 2</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
  </div>
@endsection

{{-- menambahkan js --}}
@push('script')
    
@endpush

  <!-- /.content-wrapper -->

@extends('template/footer')
