<div class="collapse" id="formLaundry">
    <div class="card-body">
        <h1>Form</h1>
        {{-- Pelanggan --}}
        <div class="card">
            <div class="card-body">

            </div>
        </div>
        {{-- Akhir --}}
        
        {{-- Paket --}}
        <div class="card">

        </div>
        {{-- Akhir --}}

        {{-- Pembayaran --}}
        <div class="card">
            <form action="">
                <div class="row col-12">
                    <div class="form-group row col-6">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="staticEmail" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="form-group row col-6">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Estimasi Selesai</label>
                        <div class="col-sm-6 ml-auto">
                            <input type="date" class="form-control" id="staticEmail" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="form-group row col-6">
                            <label for="" class="col-sm-4 col-form-label"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalMember"><i class="bi bi-plus-square"></i></button> Nama Pelanggan</label>
                            <label class="col-sm-6" id="nama-pelanggan">
                                -
                            </label>
                    </div>
                    <div class="form-group row col-6">
                        <label for="" class="col-sm-4 col-form-label">Biodata</label>
                        <label class="col-sm-6 ml-auto" id="biodata-pelanggan">
                            -
                        </label>
                    </div>
                </div>
            </form>
            <div class="table-stats order-table ov-h w-100">
                <table class="table" id="tblMember" class="table table-striped table-bordered bulk_action">
                    <thead> 
                        <tr>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>No. Phone</th>
                          <th>Alamat</th>
                          <th>Total</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td colspan="5" style="text-align: center; font-style:italic">Belum ada data</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Akhir --}}
    </div>
</div>

{{-- modal member --}}

<div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Pilih Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <table class="table table-striped table-compact" id="tblMember">
                       <thead>
                           <tr>
                               <th>No.</th>
                               <th>Nama</th>
                               <th>Jenis Kelamin</th>
                               <th>No. Phone</th>
                               <th>Alamat</th>
                               <th>Aksi</th> 
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($member as $item)   
                           <tr>
                               <td>{{ $i = (!isset($i)?1:++$i) }}
                                    <input type="hidden" id="idMember" class="idMember" value="{{ $item->id }}"></td>
                               <td>{{ $item->nama }}</td>
                               <td>{{ $item->jenis_kelamin }}</td>
                               <td>{{ $item->tlp }}</td>
                               <td>{{ $item->alamat }}</td>
                               <td><button class="pilih-member" type="button">Lihat</button></td>
                           </tr>
                           @endforeach
                       </tbody>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready( function (){
            
        //Pemilihan member
            $('#tblMember').on('click', '.pilih-member', function(){
                pilihMember(this)
                $('#modalMember').modal('hide')
            })
        //Akhir pemilihan member

        //function pilih member
            function pilihMember(x){
                const tr = $(x).closest('tr')
                const namaJK = tr.find('td:eq(1)').text()+'/'+tr.find('td:eq(2)').text()
                const biodata = tr.find('td:eq(4)').text()+'/'+tr.find('td:eq(3)').text()
                const idMember = tr.find('.idMember').val()
                $('#nama_pelanggan').val(namaJK)
                $('#biodata-pelanggan').text(biodata)
                $('#id_member').val(idMember)
            }
        //Akhir function pilih member

                $('#dataLaundry').collapse('show')


                $('#dataLaundry').on('show.bs.collapse', function () {
                    $('#formLaundry').collapse('hide');
                    $('#nav-data').addClass('active');
                    $('#nav-form').removeClass('active');
                })

                $('#formLaundry').on('show.bs.collapse' , function () {
                    $('#dataLaundry').collapse('hide');
                    $('#nav-form').addClass('active');
                    $('#nav-data').removeClass('active');
                })
            });
    </script>
@endpush