<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019  All rights
    reserved.
  </footer>

 
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/HomePage/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/HomePage/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/HomePage/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/HomePage/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/HomePage/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/HomePage/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/HomePage/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/HomePage/dist/js/demo.js"></script>

<!-- date-range-picker -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/HomePage/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>assets/HomePage/plugins/timepicker/bootstrap-timepicker.min.js"></script>


<!-- DataTables -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/HomePage/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/HomePage/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url();?>assets/HomePage/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
 $('.select2').select2()
 $('.selec2').on('select2:select', function (e) {
  // Do something
  var data = $(e.params.data.element);
    console.log(data);
    var separator = ",";
      var a = data.data('harga');
      var b = a.toString().replace(/[^\d]/g,"");
      var c = "";
      panjang = b.length;
      j = 0;
      for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
          c = b.substr(i-1,1) + separator + c;
        } else {
          c = b.substr(i-1,1) + c;
        }
      }
    console.log(c);
    $('#harga_jual').val(c);
});

  $(function () {
    $('#example1').DataTable()
    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false
    // })
  })

$(".ubah_dataUser").click(function() {
    $(".nik").val($(this).attr('data-nik'));
    $(".nama").val($(this).attr('data-nama'));
    $(".jabatan").val($(this).attr('data-jabatan'));
    $(".password").val($(this).attr('data-password'));
      // alert('aaa');
    });

$(".ubah_dataCustomer").click(function() {
    $(".id").val($(this).attr('data-id'));
    $(".nama").val($(this).attr('data-nama'));
    $(".nope").val($(this).attr('data-nope'));
    $(".alamat").val($(this).attr('data-alamat'));
      // alert('aaa');
    });

$(".ubah_dataSuplier").click(function() {
    $(".id").val($(this).attr('data-id'));
    $(".nama").val($(this).attr('data-nama'));
    $(".nope").val($(this).attr('data-nope'));
    $(".alamat").val($(this).attr('data-alamat'));
      // alert('aaa');
    });

$(".ubah_databarang").click(function() {
    $(".kode").val($(this).attr('data-kode'));
    $(".nama_barang").val($(this).attr('data-nama_barang'));
    $(".harga_beli").val($(this).attr('data-harga_beli'));
    $(".harga_jual").val($(this).attr('data-harga_jual'));
      // alert('aaa');
    });



</script>
<script type="text/javascript">
String.prototype.reverse = function () {
        return this.split("").reverse().join("");
    }

    function reformatText(input) {        
        var x = input.value;
        x = x.replace(/,/g, ""); // Strip out all commas
        x = x.reverse();
        x = x.replace(/.../g, function (e) {
            return e + ",";
        }); // Insert new commas
        x = x.reverse();
        x = x.replace(/^,/, ""); // Remove leading comma
        input.value = x;
    }

</script>

</body>


</html>
