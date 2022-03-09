{{-- Pelanggan --}}
<div class="card">
    <div class="card-body">
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
                    <input type="date" class="form-control ml-auto" name="batas_waktu"
                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}">
                </div>
            </div>
        </div>
        <div class="row" class="col-12">
            <div class="form-group row col-6">
                <label for="" class="col-sm-4 col-form-label"><button type="button" class="btn btn-info"
                        data-toggle="modal" data-target="#modalMember"><i class="bi bi-plus-square"></i></button> Nama</label>
                <label class="col-sm-6 col-form-label" id="nama-pelanggan">
                    -
                </label>
            </div>
            <div class="form-group row col-6">
                <label for="" class="col-2 col-form-label">Alamat</label>
                <label class="col-6 ml-auto col-form-label" id="biodata-pelanggan">
                    -
                </label>
            </div>
        </div>
        <div class="row" class="col-12">
            <div class="form-group row col-6">
                <label for="" class="col-sm-4 col-form-label">
                    Jenis Kelamin
                    </label>
                <label class="col-sm-6 col-form-label" id="jk">
                    -
                </label>
            </div>
            <div class="form-group row col-6">
                <label for="" class="col-2 col-form-label">No. Phone</label>
                <label class="col-6 ml-auto col-form-label" id="tlp">
                    -
                </label>
            </div>
        </div>
    </div>
</div>
{{-- Akhir --}}

{{-- Paket --}}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-info btn-sm" id="tambahPaketBtn" data-toggle="modal"
                    data-target="#modalPaket"><i class="bi bi-plus-square"></i>
                    Tambah Cucian</button>
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
                        <td colspan="5" style="text-align: center; font-style:italic">Belum ada data
                        </td>
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
                                <button class="btn btn-info swalDefaulttransSuccess" style="margin-top: 10px; width:170px"
                                    type="submit">Bayar</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Diskon</td>
                        <td><input type="number" name="diskon" id="diskon" value="0" style="width:140px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Pajak <input type="number" name="pajak" class="qty"
                                min="0" value="0" id="pajak-persen" size="2" style="width: 40px"></td>
                        <td><span id="pajak-harga">0</span></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Biaya Tambahan</td>
                        <td><input type="number" name="biaya_tambahan" style="width: 140px" value="0">
                        </td>
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
                        @foreach ($member as $m)
                            <tr>
                                <td>{{ $i = !isset($i) ? 1 : ++$i }}
                                    <input type="hidden" class="idMember" name="id_member"
                                        value="{{ $m->id }}">
                                </td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->jenis_kelamin }}</td>
                                <td>{{ $m->tlp }}</td>
                                <td>{{ $m->alamat }}</td>
                                <td><button class="pilihMemberBtn btn btn-info" type="button"><i
                                            class="bi bi-eye"></i></button></td>
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
                                <td>{{ $a = !isset($a) ? 1 : ++$a }}
                                    <input type="hidden" class="idPaket" value="{{ $item->id }}">
                                </td>
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
        $(document).ready(function() {
            let subtotal = total = 0;
            //fungsi hitung total
            function hitungTotalAkhir(a) {
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
            $('#tblTransaksi').on('change', '.qty', function() {
                hitungTotalAkhir(this)
            })

            //hapus Paket
            $('#tblTransaksi').on('click', '.btnHapusPaket', function() {
                let subTotalAwal = parseInt($(this).closest('tr').find('.subTotal').text());
                subtotal -= subTotalAwal
                total -= subTotalAwal;

                $currentRow = $(this).closest('tr').remove();
                $('#subtotal').text(subtotal)
                $('#total').text(total)
            })
            //Pemilihan member
            $('#tblMember').on('click', '.pilihMemberBtn', function() {
                pilihMember(this)
                $('#modalMember').modal('hide')
            })
            //Akhir pemilihan member
            //Pemilihan paket
            $('#tblPaket').on('click', '.pilihPaketBtn', function() {
                pilihPaket(this)
                $('#modalPaket').modal('hide')
            })
            //Akhir pemilihan paket

            //function pilih member
            function pilihMember(x) {
                const tr = $(x).closest('tr')
                const nama = tr.find('td:eq(1)').text()
                const jk = tr.find('td:eq(2)').text()
                const tlp = tr.find('td:eq(3)').text()
                const alamat = tr.find('td:eq(4)').text()
                const idMember = tr.find('.idMember').val()
                $('#nama-pelanggan').text(nama)
                $('#jk').text(jk)
                $('#tlp').text(tlp)
                $('#biodata-pelanggan').text(alamat)
                $('#id_member').val(idMember)
            }
            //Akhir function pilih member

            function pilihPaket(x) {
                const tr = $(x).closest('tr')
                const namaPaket = tr.find('td:eq(1)').text()
                const harga = tr.find('td:eq(2)').text()
                const idPaket = tr.find('.idPaket').val()

                let data = ''
                let tbody = $('#tblTransaksi tbody tr td').text()
                data += '<tr>'
                data += `<td> ${namaPaket} </td>`
                data += `<td>${harga}</td>`;
                data += `<input type="hidden" name="id_paket[]" value="${idPaket}">`
                data += `<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width:40px"></td>`;
                data += `<td><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
                data += `<td><button type="button" class="btnHapusPaket"><span class="bi bi-trash"></span></button></td>`;
                data += '</tr>';

                if(tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

                $('#tblTransaksi tbody').append(data);

                subtotal += Number(harga)
                total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
                $('#subtotal').text(subtotal)
                $('#total').text(total)
            }
        });
    </script>
@endpush
