  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets') }}/dist/js/demo.js"></script>

<!-- Data table -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
  });
</script>

@stack('login')
@stack('script')