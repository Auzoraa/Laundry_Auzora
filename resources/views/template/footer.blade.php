  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


{{-- <!-- jQuery -->
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('assets') }}/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{ asset('assets') }}/js/scripts.js"></script>
<script src="{{ asset('assets') }}/js/custom.js"></script>

<!-- Data table -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<script>
  $(document).ready( function (){
    $('#tbl-paket').DataTable({
      "aLengthMenu": [[5,10,15,20], [5,10,15,20]]
    });
    $('#tbl-outlet').DataTable({
      "aLengthMenu": [[5,10,15,20], [5,10,15,20]]
    });
    $('#tbl-member').DataTable({
      "aLengthMenu": [[5,10,15,20], [5,10,15,20]]
    });
    $('#tbl-barangInv').DataTable({
      "aLengthMenu": [[5,10,15,20], [5,10,15,20]]
    });

    $('#tblMember').DataTable({
      "aLengthMenu": [[5,10,15,20], [5,10,15,20]]
    });
    $('#tblPaket').DataTable({
      "aLengthMenu": [[5,10,15,20], [5,10,15,20]]
    });
            let subtotal = total = 0;

            //Pemilihan member
            $('#tblMember').on('click', '.pilihMemberBtn', function(){
                pilihMember(this)
                $('#modalMember').modal('hide')
            })
        //Akhir pemilihan member
        //Pemilihan paket
            $('#tblPaket').on('click', '.pilihPaketBtn', function(){
                pilihPaket(this)
                $('#modalPaket').modal('hide')
            })
        //Akhir pemilihan paket

        //function pilih member
            function pilihMember(x){
                const tr = $(x).closest('tr')
                const namaJK = tr.find('td:eq(1)').text()+"/"+tr.find('td:eq(2)').text()
                const biodata = tr.find('td:eq(4)').text()+"/"+tr.find('td:eq(3)').text()
                const idMember = tr.find('.idMember').val()
                $('#nama-pelanggan').text(namaJK)
                $('#biodata-pelanggan').text(biodata)
                $('#id_member').val(idMember)
            }
        //Akhir function pilih member

        function pilihPaket(x){
                const tr = $(x).closest('tr')
                const namaPaket = tr.find('td:eq(1)').text()
                const harga = tr.find('td:eq(2)').text()
                const idPaket = tr.find('.idPaket').val()

                let data = ''
                let tbody = $('#tblTransaksi tbody tr td').text()
                data += '<tr>'
                data += `<td>${namaPaket}</td>`
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

@stack('login')
@stack('script')
@stack('scripts')