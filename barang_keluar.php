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
                <h3>Barang Keluar</h3>
              </div>

            </div>

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <a href="input_pengiriman.php"><button class="btn btn-info">Input</button></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr >
                          <th >No</th>
                          <th>No Surat</th>
                          <th>Penerima</th>
                          <th>Pengirim</th>
                          <th>Tanggal Kirim</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php  
                          $no = 1;
                      		$result = $mysqli->query("SELECT * from tblpengiriman where status = 'send'");
                      		while ( $row = $result -> fetch_array()) {
                      	?>
                      	<tr style="text-align:center">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['no_surat']; ?></td>
                          <td><?php echo $row['penerima']; ?></td>
                          <td><?php echo $row['almt_penerima']; ?></td> 
                          <td><?php echo $row['pengirim']; ?></td> 
                          <td><?php echo $row['tgl_kirim']; ?></td>              
                          <td style="text-align:center"> 

                            <a href="detail_barangKeluar.php?id=<?php echo $row['no_surat']; ?>" class="btn btn-sm btn-warning"  title="Detail"><span class="fa fa-file"></span></a>
                            <a href="print_barangKeluar.php?id=<?php echo $row['no_surat'];?>" class="btn btn-sm btn-success"  title="Print"><span class="fa fa-print"></span></a>
                            <?php if ($_SESSION['hak_akses']=='admin'): ?>
                              <a href="delete_barangKeluar.php?id=<?php echo $row['no_surat']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $row['no_surat']; ?>')" class="btn btn-sm btn-danger"  title="Delete"><span class="fa fa-trash"></span></a>
                            <?php endif ?>
                            

                            <!-- Delete Modal
                             <a href="javascript:;" data-id="<?php echo $row['no_surat']; ?>" data-toggle= "modal"
                             data-target="#modal-konfirmasi" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                            -->

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

      <!-- modal konfirmasi
        <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body ">
                    Apakah Anda yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-default" id="hapus-true-data">Hapus</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
                 
                </div>
            </div>
        </div>
      -->

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

  </body>
</html>

<?php
    }else{
    header("location:login.php");
    die(); 
    }
    
?>