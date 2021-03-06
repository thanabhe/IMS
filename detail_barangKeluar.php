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
                <h3>Detail Pengiriman</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Jalan</h2>
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

                    <section class="content invoice">
                    <?php 
                      $no_surat = $_GET['id'];
                      $query = $mysqli->query("SELECT tblpengiriman.no_surat,tblbarang.nama_brg,detailpengiriman.qty,detailpengiriman.sn,detailpengiriman.notes, tblpengiriman.tgl_kirim,tblpengiriman.pengirim, user.email, tblpengiriman.penerima, tblpengiriman.almt_penerima FROM tblbarang,tblpengiriman,detailpengiriman,user WHERE tblpengiriman.no_surat = detailpengiriman.no_surat and tblbarang.matnr = detailpengiriman.matnr and tblpengiriman.username = user.username and detailpengiriman.no_surat = '$no_surat'");
                      $data = $query->fetch_array();

                    ?>
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                              <img class="" src="images/logo_tnd.png" class="img-circle profile_img"> Surat Jalan.
                              <small class="pull-right">Nomor Surat : <?php echo $data['no_surat'] ?></small>
                              
                          </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                            <small class="pull-right">Tanggal: <?php $format1 = $tanggal = $data['tgl_kirim']; echo date('d-m-Y', strtotime($tanggal));  ?></small>
                          </h1>
                        </div>  
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From :
                          <address>
                                          <strong><?php echo $data['pengirim'] ?></strong>
                                          <br>IT
                                          <br><?php echo $data['email'] ?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To :
                          <address>
                              <strong><?php echo $data['penerima'] ?></strong>
                              <p><?php echo $data['almt_penerima']; ?></p>
                          </address>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Serial #</th>
                                <th>Notes</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $no = 1;
                              $query1 = $mysqli->query ("SELECT tblpengiriman.no_surat,tblbarang.nama_brg,detailpengiriman.qty,detailpengiriman.sn,detailpengiriman.notes, tblpengiriman.tgl_kirim,tblpengiriman.pengirim, tblpengiriman.penerima FROM tblbarang,tblpengiriman,detailpengiriman WHERE tblpengiriman.no_surat = detailpengiriman.no_surat and tblbarang.matnr = detailpengiriman.matnr and detailpengiriman.no_surat = '$no_surat'");
                              while ($row = $query1->fetch_array()) {
                            ?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['nama_brg'] ?></td>
                                <td><?php echo $row['qty'] ?></td>
                                <td><?php echo $row['sn'] ?></td>
                                <td><?php echo $row['notes'] ?></td>
                              </tr>

                          <?php $no++;} ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <td style="text-align:center">  
                          <?php
                            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                          ?>                        
                        <a href="<?=$url?>" class="btn btn-sm btn-danger"  title="Back"><span class="fa fa-arrow-left"> BACK</span></a>

                            <a href="edit_dataPengiriman.php?id=<?php echo $row['no_surat']; ?>" class="btn btn-sm btn-success"  title="Detail"><span class="fa fa-pencil"></span> Edit</a>
                      </td>
                     
                    </section>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>