 <!-- REQUIRED SCRIPTS -->
 <!-- jQuery -->
 <script src="/backend/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap -->
 <script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="/backend/dist/js/adminlte.js"></script>

 <!-- OPTIONAL SCRIPTS -->
 <script src="/backend/dist/js/demo.js"></script>

 <!-- PAGE PLUGINS -->
 <!-- jQuery Mapael -->
 <script src="/backend/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
 <script src="/backend/plugins/raphael/raphael.min.js"></script>
 <script src="/backend/plugins/jquery-mapael/jquery.mapael.min.js"></script>
 <script src="/backend/plugins/jquery-mapael/maps/usa_states.min.js"></script>
 <!-- ChartJS -->
 <script src="/backend/plugins/chart.js/Chart.min.js"></script>

 <!-- PAGE SCRIPTS -->
 <script src="/backend/dist/js/pages/dashboard2.js"></script>

 <!-- sweet alert 2 -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 <!-- DataTables -->
 <script src="/backend/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- bs-custom-file-input -->
 <script src="/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
 <script>
     $(function() {
         $('#tbl-produk').DataTable({
             "responsive": true,
             "autoWidth": false,
         })
         $('#tbl-department').DataTable({
             "responsive": true,
             "autoWidth": false,
         })
         $('#tbl-pesanan').DataTable({
             "responsive": true,
             "autoWidth": false,
         })
         
         bsCustomFileInput.init();

         function readURL(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('.img-preview').attr('src', e.target.result);
                 }

                 reader.readAsDataURL(input.files[0]);
             }
         }

         $("#gambar").change(function() {
             readURL(this);
         });
     })
 </script>
 </body>

 </html>