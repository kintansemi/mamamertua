</aside><!-- /.right-side -->
</div>
<!-- jQuery 2.0.2 -->
 <!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/AdminLTE/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<?php if (!in_array($class_name, $blacklist)): ?>
 <script src="<?= base_url('assets/AdminLTE/js/AdminLTE/app.js') ?>" type="text/javascript"></script>
<?php endif; ?>

<script src="<?= base_url('assets/AdminLTE/js/plugins/datatables/jquery.dataTables.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/AdminLTE/js/plugins/datatables/dataTables.bootstrap.js') ?>" type="text/javascript"></script>

<script src="<?= base_url('assets/AdminLTE/js/plugins/input-mask/jquery.inputmask.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/AdminLTE/js/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/AdminLTE/js/plugins/input-mask/jquery.inputmask.extensions.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/AdminLTE/js/plugins/timepicker/bootstrap-timepicker.min.js') ?>" type="text/javascript"></script>

<script src="<?= base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>
<script type="text/javascript">
$(function() {
    $("#example1").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
     $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();
});
</script>

</body>
</html>
