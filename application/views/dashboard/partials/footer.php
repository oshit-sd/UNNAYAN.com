    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <!--<b>Version</b> 2.4.0-->
        </div>
        <strong>Copyright &copy; <a href="<?php echo base_url();?>">UNNAYAN </a>.</strong> All rights
        reserved.
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>libs/BackEnd/assets/js/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script  src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script  src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Morris.js charts -->
<script  src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/raphael/raphael.min.js"></script>
<script  src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->

<script  src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>


<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/moment/min/moment.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->



<!-- jvectormap -->
<script  src="<?php echo base_url();?>assets/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script  src="<?php echo base_url();?>assets/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="<?php echo base_url();?>libs/BackEnd/assets/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>libs/BackEnd/assets/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>libs/BackEnd/assets/template/dist/js/adminlte.min.js"></script>
<!-- Select Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"></script>




<script src="<?php echo base_url();?>libs/BackEnd/assets/js/back.js"></script>

<!--Date picker-->
<script src="<?php echo base_url();?>libs/BackEnd/assets/js/bootstrap-datetimepicker.min.js"></script>
<script>
    //Date Picker
    $(function () {
        $('#datepicker').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });
</script>

<script>
    //Date Picker
    $(function () {
        $('#datepicker2').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });
</script>




<!-- Data Tables -->
<!-- <script src="<?php echo base_url()?>libs/BackEnd/jquery/jquery-3.1.0.min.js"></script>
<script src="<?php echo base_url()?>libs/BackEnd/bootstrap/js/bootstrap.min.js"></script> -->


<!-- For Fancy Box -->
<script type="text/javascript" src="<?php echo base_url()?>libs/BackEnd/fancyBox/js/jquery.fancybox.js?v=2.1.5"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>libs/BackEnd/fancyBox/css/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">

        $(document).ready(function() {

            $('.fancybox').fancybox({

            padding: 0,

                openEffect : 'elastic',

                openSpeed  : 150,

                closeEffect : 'elastic',

                closeSpeed  : 150,

                maxWidth    : "60%",

                autoSize    : true,

                autoScale   : true,

                fitToView   : true,

                helpers : {

                    title : {

                        type : 'inside'

                    },

                    overlay : {

                        css : {

                            'background' : 'rgba(0,0,0,0.3)'

                        }

                    }

                }       

            });

            $('.fancyboxview').fancybox({

            padding: 0,

                openEffect : 'elastic',

                openSpeed  : 150,



                closeEffect : 'elastic',

                closeSpeed  : 150,

                maxWidth    : "95%",

                autoSize    : true,

                autoScale   : true,

                fitToView   : true,



                helpers : {

                    title : {

                        type : 'inside'

                    },

                    overlay : {

                        css : {

                            'background' : 'rgba(0,0,0,0.3)'

                        }

                    }

                }       

            });

        });    

</script>



<script src="<?php echo base_url();?>libs/BackEnd/editor/ckeditor.js"></script>
<script type="text/javascript">
    $(function() {
        $('#txtEditor').each(function(){
            CKEDITOR.replace( $(this).attr('id') );
        });
    });
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>




<script src="<?php echo base_url()?>libs/BackEnd/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>libs/BackEnd/datatables/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
   $(document).ready( function () {
      $('#table').DataTable();
  });
</script>


<!-- <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
 -->

</body>
</html>
