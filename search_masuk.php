<?php 
  session_start();
   if (isset($_SESSION['username'])) {  

  include_once 'connect.php';
  include 'template.php';
 
  publicHeader();
  publicBody();
  profile();
  if ($_SESSION['hak_akses']=='admin') {
          menuAdmin();
      }elseif ($_SESSION['hak_akses']=='staff') {
        menuStaff();
      }
  topBar(); 
?>



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Search Transaksi Masuk</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="col-md-6 col-sm-6 col-xs-6">
              <div class="x_panel">
               
                  <form class="form-horizontal form-label-left" role="search">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Serial Number <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" name="search_query" id="search_query" required="" class="form-control" placeholder="Serial Number">
                        </div>
                      </div>
                  </form>
                
              </div>
            </div>
            <form></form>

             
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div id="display_results"></div>
                      
                </div>
              </div>

            <div class="container">
              <div id="display_results"></div>
               
              </div>  

            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php footer(); ?>
        
      </div>
    </div>
    
    <?php defaultQuery(); ?>
    <!-- Datatables -->
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    
<script type='text/javascript'> 
  $(document).ready(function() {
        //$("#search_results").slideUp();
        $("#button_find").click(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
        $("#search_query").keyup(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
    });
    function ajax_search() {
 
        var sn = $("#search_query").val();
        $.ajax({
            url : "data_Smasuk.php",
            data : "sn=" + sn ,
            success : function(data) {
                // jika data sukses diambil dari server, tampilkan di <select id=>
                $("#display_results").html(data);
            }
        });

    }
  </script>


    


  </body>
</html>

<?php
    }else{
    header("location:login.php");
    die(); 
    }
    
?>