
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
    <!--Realizado por Camilo Cruz-->
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="assets/node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/jszip/jszip.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/node_modules/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/node_modules/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/node_modules/admin-lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/node_modules/admin-lte/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print" /*, "colvis"*/]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
