 <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> Developed by: <a href="https://www.raymark.com">Raymark Loreno</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="<?php echo base_url()?>assets/template/plugins/jQueryMask/dist/jquery.mask.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/md5.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/template/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/plugins/fullcalendar/main.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/plugins/fullcalendar-daygrid/main.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/plugins/fullcalendar-timegrid/main.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/plugins/fullcalendar-interaction/main.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/plugins/fullcalendar-bootstrap/main.min.js"></script>
  
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- <script src="<?php //echo base_url();?>assets/template/plugins/toastr/toastr.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>assets/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- <script src="<?php //echo base_url();?>assets/template/plugins/popper/popper.js"></script> -->
<!-- Bootstrap slider -->
<!-- <script src="<?php //echo base_url();?>assets/template/plugins/bootstrap-slider/bootstrap-slider.min.js"></script> -->



<script type="text/javascript">
    (function () {
        var options = {
            facebook: "100411365228526", // Facebook page ID
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
</body>
</html>
