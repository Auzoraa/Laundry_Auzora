  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('assets') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('assets') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('assets') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets') }}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets') }}/dist/js/demo.js"></script>
  <!-- Data table -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>

  <script>
      $(document).ready(function() {
          $('#tbl-paket').DataTable({
              "aLengthMenu": [
                  [5, 10, 15, 20],
                  [5, 10, 15, 20]
              ]
          });
          $('#tbl-outlet').DataTable({
              "aLengthMenu": [
                  [5, 10, 15, 20],
                  [5, 10, 15, 20]
              ]
          });
          $('#tbl-member').DataTable({
              "aLengthMenu": [
                  [5, 10, 15, 20],
                  [5, 10, 15, 20]
              ]
          });
          $('#tbl-barangInv').DataTable({
              "aLengthMenu": [
                  [5, 10, 15, 20],
                  [5, 10, 15, 20]
              ]
          });

          $('#tblMember').DataTable({
              "aLengthMenu": [
                  [5, 10, 15, 20],
                  [5, 10, 15, 20]
              ]
          });
          $('#tblPaket').DataTable({
              "aLengthMenu": [
                  [5, 10, 15, 20],
                  [5, 10, 15, 20]
              ]
          });
      });
  </script>

  @stack('login')
  @stack('script')
  @stack('scripts')
