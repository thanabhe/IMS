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
                <h3>Form Penerimaan</h3>
              </div>

            </div>

            <div class="clearfix"></div>

             <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Data</small></h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" action="proses_sementara2.php" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qty <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="number" id="first-name" name="qty" required="required" class="form-control col-md-7 col-xs-12" value="1" readonly="">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Notes <span></span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" id="first-name" name="notes"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>                        
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead >
                        <tr >
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Qty</th>
                          <th>SN</th>
                          <th>Notes</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                          $no = 1;
                          $result = $mysqli->query("SELECT * from tblsementara,tblbarang where tblsementara.matnr = tblbarang.matnr ");
                          while ( $row = $result -> fetch_array()) {
                        ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['nama_brg']; ?></td>
                          <td><?php echo $row['qty']; ?></td>
                          <td><?php echo $row['sn']; ?></td>
                          <td><?php echo $row['notes']; ?></td>                
                          <td><a href="delete_dtsementara2.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash" ><i></i></span></a></td>
                        </tr>

                        <?php $no++;} ?>
                      </tbody>
                    </table>
                      

                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Proses Data</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form id="demo-form2" action="proses_inputPenerimaan.php" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Surat <span class="required" >*</span>
                        </label>
                        <?php 

                          $row = $mysqli->query("SELECT no_surat FROM tblpengiriman ORDER BY no_surat DESC LIMIT 1");
                          $cek = $row -> fetch_array();
                          
                          $ex = explode('/', $cek['no_surat']);
                           
                          
                          $a = $ex[0]+1; 
                           
                          $b = 'IT';
                          $c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
                          $d = date('Y');
                          $o = '';
                          for ($i=0; $i<4-strlen ($a) ; $i++) { 
                            $o = $o.'0';
                          }
                          $no_surat= $o.$a.'/'.$b.'/'.$c[date('n')].'/'.$d;
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="no_surat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $no_surat; ?> " readonly="readonly">
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pengirim <span class="required">*</span>
                        </label>
                        <div class="col-md-3d-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="pengirim" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                          
                          <input type="text" id='store' name="alamat" class="form-control ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select type="text" id="first-name" name="jenis" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="Barang">Barang</option>
                            <option value="Document">Document</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Terima <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id='myDatepicker2' name="tgl_kirim" class="form-control ">
                        </div>
                      </div> 

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-danger" type="reset">Reset</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>
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