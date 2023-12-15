   <!-- Main Footer -->
   <footer class="main-footer text-sm" style="max-height: 1px">
       <strong>Copyright &copy; Bornip Inc. 2019 - <?= date('Y'); ?>.</strong>
       All rights reserved.
       <div class="float-right d-none d-sm-inline-block">
           <b>Version</b> 3.0
       </div>
   </footer>
   <!-- </div> -->

   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <!-- <a class="scroll-to-top rounded" href="#page-top">
       <i class="fas fa-angle-up"></i>
   </a> -->

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
               </div>
           </div>
       </div>
   </div>


   </div>

   <!-- REQUIRED SCRIPTS -->
   <!-- jQuery -->
   <!-- <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script> -->
   <!-- Bootstrap -->
   <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>

   <!-- OPTIONAL SCRIPTS -->
   <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>

   <!-- PAGE PLUGINS -->
   <!-- jQuery Mapael -->
   <script src="<?= base_url('assets/') ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
   <script src="<?= base_url('assets/') ?>plugins/raphael/raphael.min.js"></script>
   <script src="<?= base_url('assets/') ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
   <script src="<?= base_url('assets/') ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
   <!-- ChartJS -->
   <script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>

   <!-- PAGE SCRIPTS -->
   <!-- <script src="<?= base_url('assets/') ?>dist/js/pages/dashboard2.js"></script> -->

   <script type="text/javascript">
       // memanggil plugin magnific popup
       $('.portfolio-popup').magnificPopup({
           type: 'image',
           removalDelay: 300,
           mainClass: 'mfp-fade',
           gallery: {
               enabled: true
           },
           zoom: {
               enabled: true,
               duration: 300,
               easing: 'ease-in-out',
               opener: function(openerElement) {
                   return openerElement.is('img') ? openerElement : openerElement.find('img');
               }
           }
       });
       // memanggil datatable membuat callback datatable pada magnific popup agar gambar 
       // yang di munculkan sesuai pada saat pindah paginasi dari 1 ke 2 
       // dan seterusnya
       $(document).ready(function() {
           var table = $('#example').dataTable({
               "fnDrawCallback": function() {
                   $('.portfolio-popup').magnificPopup({
                       type: 'image',
                       removalDelay: 300,
                       mainClass: 'mfp-fade',
                       gallery: {
                           enabled: true
                       },
                       zoom: {
                           enabled: true,
                           duration: 300,
                           easing: 'ease-in-out',
                           opener: function(openerElement) {
                               return openerElement.is('img') ? openerElement : openerElement.find('img');
                           }
                       }
                   });
               }
           });
       });
   </script>

   </body>

   </html>