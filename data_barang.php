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
                <h3>Data Barang</h3>
              </div>

            </div>

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <!-- Large modal -->
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-pencil"> Input</i></button>

                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">INPUT BARANG</h4>
                        </div>
                        <div class="modal-body">
                          <form id="demo-form2" action="proses_inputBarang.php" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Barang <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" id="first-name" name="kd_brg" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Barang <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" id="first-name" name="nm_brg" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>               
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Qty <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="number" id="first-name" name="qty" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                        
                          <button class="btn btn-danger" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div> 
                    </form>
                        </div>
                        <div class="modal-footer">
                        </div>

                      </div>
                    </div>
                  </div>
                    <a href="export_barang.php"><button class="btn btn-danger"><i class="fa fa-download"> Export</i></button></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead >
                        <tr >
                          <th style="text-align:center">No</th>
                          <th style="text-align:center">Kode Barang</th>
                          <th style="text-align:center">Nama Barang</th>
                          <th style="text-align:center">Qty</th>
                          <th style="text-align:center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php  
                          $no = 1;
                      		$result = $mysqli->query("SELECT * from tblbarang");
                      		while ( $row = $result -> fetch_array()) {
                      	?>
                      	<tr style="text-align:center">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['matnr']; ?></td>
                          <td><?php echo $row['nama_brg']; ?></td>
                          <td><?php echo $row['stock']; ?></td>                       
                          <td>
                            <a href="edit_dataBarang.php?id=<?php echo $row['matnr'];?>" class="btn btn-sm btn-warning"  title="Edit"><span class="fa fa-pencil"></span></a>
                            <?php if ($_SESSION['hak_akses']=='admin'): ?>
                              <a href="delete_dataBarang.php?id=<?php echo $row['matnr']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $row['nama_brg']; ?>')" class="btn btn-sm btn-danger"  title="Delete"><span class="fa fa-trash"></span></a>
                            <?php endif ?>                            
                          </td>
                        </tr>

                        <?php $no++;} ?>
                      </tbody>
                    </table>
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
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

  </body>
</html>

<?php
    }else{
    header("location:login.php");
    die(); 
    }
    
?>