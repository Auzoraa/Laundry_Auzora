<div class="collapse collapse-horizontal" id="formLaundry">
    <div class="card-body bg-info">
        <h1>Form</h1>
        {{-- Pelanggan --}}
        <div class="card">
            <div class="card-body"  style="color: black">
                <div class="row" class="col-12">
                    <div class="form-group row col-6">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="tgl" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="form-group row col-6">
                        <label for="inputPassword" class="col-4 col-form-label">Estimasi Selesai</label>
                        <div class="col-6 ml-auto">
                            <input type="date" class="form-control ml-auto" name="batas_waktu" value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}">
                        </div>
                    </div>
                </div>
                <div class="row" class="col-12">
                    <div class="form-group row col-6">
                        <label for="" class="col-sm-4 col-form-label"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalMember"><i class="bi bi-plus-square"></i></button> Nama Pelanggan</label>
                        <label class="col-sm-6 col-form-label" id="nama-pelanggan">
                            -
                        </label>
                    </div>
                    <div class="form-group row col-6">
                        <label for="" class="col-2 col-form-label">Biodata</label>
                        <label class="col-6 ml-auto col-form-label" id="biodata-pelanggan">
                            -
                        </label>
                    </div>
                </div>
            </div>
        </div>
        {{-- Akhir --}}

        {{-- Paket --}}
        <div class="card">
            <div class="card-body"  style="color: black">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-info btn-sm" id="tambahPaketBtn" data-toggle="modal" data-target="#modalPaket"><i class="bi bi-plus-square"></i> Tambah Cucian</button> 
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
                    <div class="row">
                        <table id="tblTransaksi" class="table table-striped table-bordered bulk_action">
                            <thead> 
                                <tr>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="5" style="text-align: center; font-style:italic">Belum ada data</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr valign="bottom">
                                    <td width="" colspan="3" align="right">Jumlah Bayar</td>
                                    <td><span id="subtotal">0</span></td>
                                    <td rowspan="5">
                                        <label for="">Pembayaran</label>
                                        <input type="text" class="form-control" name="bayar" id="" value="0" style="width:170px">
                                        <div class="">
                                            <button class="btn btn-info" style="margin-top: 10px; width:170px" type="submit">Bayar</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr> 
                                    <td colspan="3" align="right">Diskon</td>
                                    <td><input type="number" name="diskon" id="diskon" value="0" style="width:140px"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">Pajak <input type="number" name="pajak" class="qty" min="0" value="0" id="pajak-persen" size="2" style="width: 40px"></td>
                                    <td><span id="pajak-harga">0</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">Biaya Tambahan</td>
                                    <td><input type="number" name="biaya_tambahan" style="width: 140px" value="0"></td>
                                </tr>
                                <tr style="background-color: aquamarine;color:black;font-weight:bold;font-size:1em">
                                    <td colspan="3" align="right">Total bayar</td>
                                    <td><span id="total">0</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
        {{-- Akhir --}}

        {{-- Pembayaran --}}

        {{-- Akhir --}}
    </div>
</div>

{{-- modal member --}}
<div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Pilih Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <table id="tblMember" class="table table-striped table-compact">
                       <thead>
                           <tr>
                               <th>No.</th>
                               <th>Nama</th>
                               <th>JK</th>
                               <th>No. Phone</th>
                               <th>Alamat</th>
                               <th>Aksi</th> 
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($member as $item)   
                           <tr>
                               <td>{{ $i = (!isset($i)?1:++$i) }}
                                    <input type="hidden" class="idMember" name="id_member" value="{{ $item->id }}"></td>
                               <td>{{ $item->nama }}</td>
                               <td>{{ $item->jenis_kelamin }}</td>
                               <td>{{ $item->tlp }}</td>
                               <td>{{ $item->alamat }}</td>
                               <td><button class="pilihMemberBtn btn btn-info" type="button"><i class="bi bi-eye"></i></button></td>
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

{{-- Modal Paket --}}
<div class="modal fade" id="modalPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Pilih Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <table class="table table-striped table-compact" id="tblPaket">
                       <thead>
                           <tr>
                               <th>No.</th>
                               <th>Nama Paket</th>
                               <th>Harga</th>
                               <th>Aksi</th> 
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($paket as $item)   
                           <tr>
                               <td>{{ $a = (!isset($a)?1:++$a) }}
                                    <input type="hidden" class="idPaket" value="{{ $item->id }}"></td>
                               <td>{{ $item->nama_paket }}</td>
                               <td>{{ $item->harga }}</td>
                               <td><button class="pilihPaketBtn" type="button">Lihat</button></td>
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

@push('scripts')
    <script>      
  $(document).ready( function (){

        //fungsi hitung total
            function hitungTotalAkhir(a){
                let qty = Number($(a).closest('tr').find('.qty').val());
                let harga = Number($(a).closest('tr').find('td:eq(1)').text());
                let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
                console.info(qty, harga, subTotalAwal)
                let count = qty * harga;
                subtotal = subtotal - subTotalAwal + count
                total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
                $(a).closest('tr').find('.subTotal').text(count)
                $('#subtotal').text(subtotal)
                $('#total').text(total)

            }
        //akhir hitot
        //on change qty
        $('#tblTransaksi').on('change', '.qty', function(){
            hitungTotalAkhir(this)
        })

        //hapus Paket
        $('#tblTransaksi').on('click', '.btnHapusPaket', function(){
            let subTotalAwal = parseInt($(this).closest('tr').find('.subTotal').text());
            subtotal -= subTotalAwal
            total -= subTotalAwal;

            $currentRow = $(this).closest('tr').remove();
            $('#subtotal').text(subtotal)
            $('#total').text(total)
        })

        //Script collapse
                $('#dataLaundry').collapse('show')


                $('#dataLaundry').on('show.bs.collapse', function () {
                    $('#formLaundry').collapse('hide');
                    $('#nav-form').removeClass('active');
                    $('#nav-data').addClass('active');
                })

                $('#formLaundry').on('show.bs.collapse' , function () {
                    $('#dataLaundry').collapse('hide');
                    $('#nav-data').removeClass('active');
                    $('#nav-form').addClass('active');
                })
            // end collapse
  });

    </script>
@endpush