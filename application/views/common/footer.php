<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?= base_url('vendor/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('vendor/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('js/sb-admin.min.js') ?>"></script>
 

<script src="<?= base_url('js/horsey.js') ?>"></script>
 <script src="<?= base_url('js/bootbox.js') ?>"></script>
 
  <script src="<?= base_url('js/jquery.tabletojson.js') ?>"></script>
  
 
    <script src="<?= base_url('js/print.min.js') ?>"></script>
 
 <script>
 
 
 jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};
 
 </script>
<!-- Custom scripts for this page-->
 

