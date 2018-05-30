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
                <h3>Form Barang</h3>
              </div>

            </div>

            <div class="clearfix"></div>

             <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Data</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" action="proses_dtlbrg.php" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Code <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <?php 
                            
                            function randomPrefix($length)
                            {
                            $random= "";
                            srand((double)microtime()*1000000);
                             
                            $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
                            $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
                            $data .= "0FGH45OP89";
                             
                            for($i = 0; $i < $length; $i++)
                            {
                            $random .= substr($data, (rand()%(strlen($data))), 1);
                            }
                             
                            return $random;
                            }

                          ?>
                          <input type="teks" id="first-name" name="code" required="required" class="form-control col-md-7 col-xs-12" readonly="" value="<?php echo $a = randomPrefix(10); ?>">
                        </div>
                      </div>   
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Barang <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">                          
                          <select type="text"  name="nama_brg" required="required" class="chosen-select">
                            <?php 
                             $row = $mysqli->query("SELECT*from tblbarang"); 
                             if ($row->num_rows>0) { ?>
                                <?php while ($data= $row->fetch_array()) { ?>
                                  <option value="<?php echo $data['matnr']; ?>"><?php echo $data['nama_brg']; ?></option>
                              <?php } ?>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merk <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="teks" id="first-name" name="merk" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>              
                      <div class="form-group">  
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Serial Number <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" id="first-name" name="sn" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>               
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span>*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" id="first-name" name="status"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>              
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lokasi <span>*</span>
                        </label>
                       <div class="col-md-7 col-sm-7 col-xs-12">                          
                          <input type="text" id='store' name="lokasi" class="form-control ">
                        </div>
                      </div>            
                       <div class="ln_solid"></div>           
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-danger" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                     
                    </form>
                  </div>
                </div>
              </div>

              
              
          </div>
        </div>
        <!-- /page content -->

        <?php footer(); ?>

      </div>
    </div>

    <?php defaultQuery(); ?>
    
    <!-- jQuery UI -->
    <script src="vendors/jquery-ui/jquery-ui.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="vendors/chosen/chosen.jquery.js"></script>  
    <script>
          $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
          });  

          $('#myDatepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
          });


/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() { 
        $( "#store" ).autocomplete({
         source: "dataJqueryStore.php", 
           minLength:1,
        });
    });

    </script>

  </body>
</html>



<?php
    }else{
    header("location:login.php");
      die();
    }
    
?>