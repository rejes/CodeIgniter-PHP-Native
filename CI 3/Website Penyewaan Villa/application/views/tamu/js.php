<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="<?php echo base_url().'assets/script.js' ?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>
<script src="<?php echo base_url();?>assets/owl-carousel/owl.carousel.js"></script>

<script src="<?php echo base_url();?>assets/date_picker_bootstrap/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>


<script type="text/javascript">
var date = new Date();
date.setDate(date.getDate());
 $('.form_date').datetimepicker({

        language:  'id',

        weekStart: 1,

        todayBtn:  1,



  autoclose: 1,

  todayHighlight: 1,

  startView: 2,

  minView: 2,

  startDate: date,

  forceParse: 0

    });

</script>