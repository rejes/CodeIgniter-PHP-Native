<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB | SISPAMAL-26</title>

<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?= base_url();?>assets/favico.ico" />

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_Url();?>assets/admin_lte/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="<?=base_Url();?>assets/admin_lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?=base_Url();?>assets/admin_lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="<?=base_Url();?>assets/admin_lte/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_Url();?>assets/admin_lte/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?=base_Url();?>assets/admin_lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?=base_Url();?>assets/admin_lte/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="<?=base_Url();?>assets/admin_lte/plugins/summernote/summernote-bs4.min.css">
<!-- Sweetalert -->
<script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
<!-- Sweetalert -->
<script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.css">

<script>
var jq14 = jQuery.noConflict(true);

(function($) {
    $(document).ready(function() {
        $("#group-select").selectize({
            placeholder: "Search...",
            allowClear: true
        });
    });
}(jq14));
</script>

<!-- DataTables -->
<link rel="stylesheet"
    href="<?= base_url();?>assets/admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?= base_url();?>assets/admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">