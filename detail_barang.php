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
                <h3>Detail Barang</h3>
              </div>

            </div>

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <a href="input_dtlbrg.php"><button class="btn btn-info"><i class="fa fa-pencil"> Input</i></button></a>
                    <a href="export_dtlbarang.php"><button class="btn btn-danger"><i class="fa fa-download">  Export</i></button></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead >
                        <tr >
                          <th style="text-align:center">No</th>
                          <th style="text-align:center">Code</th>
                          <th style="text-align:center">Nama Barang</th>
                          <th style="text-align:center">Merk</th>
                          <th style="text-align:center">SN</th>
                          <th style="text-align:center">Status</th>
                          <th style="text-align:center">Lokasi</th>
                          <th style="text-align:center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php  
                          $no = 1;
                      		$result = $mysqli->query("SELECT * from tblbarang INNER JOIN detailbarang ON detailbarang.matnr=tblbarang.matnr ");
                      		while ( $row = $result -> fetch_array()) {
                      	?>
                      	<tr style="text-align:center">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['barcode']; ?></td>
                          <td><?php echo $row['nama_brg']; ?></td>
                          <td><?php echo $row['merk']; ?></td>
                          <td><?php echo $row['sn']; ?></td>     
                          <td><?php echo $row['status']; ?></td>  
                          <td><?php echo $row['lokasi']; ?></td>                    
                          <td>
                            <a href="view_dtlBrg.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-success"  title="View"><span class="fa fa-search"></span></a>
                            <a href="edit_dtlBrg.php?id=<?php echo $row['matnr'];?>" class="btn btn-sm btn-warning"  title="Edit"><span class="fa fa-pencil"></span></a>
                            <?php if ($_SESSION['hak_akses']=='admin'): ?>
                              <a href="delete_dtlBrg.php?id=<?php echo $row['matnr']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $row['nama_brg']; ?>')" class="btn btn-sm btn-danger"  title="Delete"><span class="fa fa-trash"></span></a>
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