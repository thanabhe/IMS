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
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">

              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="x_panel">
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
                          <h3>
                              <img class="" src="images/logo_tnd.png" class="img-circle profile_img"> Surat Jalan
                              <small class="pull-right">Lampiran 1: Pengirim</small><br>
                              <small class="pull-right">No : <?php echo $data['no_surat'] ?></small><br>
                            <small class="pull-right">Tgl: <?php $format1 = $tanggal = $data['tgl_kirim']; echo date('d-m-Y', strtotime($tanggal));  ?></small>
                          </h3>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h3>                          
                              
                          </h3>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <br>
                      <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                          From :
                          <address>
                                          <strong><?php echo $data['pengirim'] ?></strong>
                                          <br>
                                          IT
                                          <br><?php echo $data['email'] ?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
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
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <td><?php echo $row[3] ?></td>
                                <td><?php echo $row[4] ?></td>
                              </tr>

                          <?php $no++;} ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-3 col-xs-offset-6 ">
                          <h4>Delivered by</h4> 
                          <br> <br> <br>
                          <p><b>(<?php echo $data['pengirim'] ?>)</b></p>                          
                        </div>
                        <div class="col-xs-3">
                          <h4>Recieved by</h4>
                          <br> <br> <br>
                          <p><b>(..............................)</b></p> 
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      
                    </section>
                  </div>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="x_panel">
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
                          <h3>
                              <img class="" src="images/logo_tnd.png" class="img-circle profile_img"> Surat Jalan
                              <small class="pull-right">Lampiran 2: Penerima</small><br>
                              <small class="pull-right">No : <?php echo $data['no_surat'] ?></small><br>
                            <small class="pull-right">Tgl: <?php $format1 = $tanggal = $data['tgl_kirim']; echo date('d-m-Y', strtotime($tanggal));  ?></small>
                          </h3>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h3> 
                          </h3>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <br>
                      <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                          From :
                          <address>
                                          <strong><?php echo $data['pengirim'] ?></strong><br>
                                          IT
                                          <br><?php echo $data['email'] ?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
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
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <td><?php echo $row[3] ?></td>
                                <td><?php echo $row[4] ?></td>
                              </tr>

                          <?php $no++;} ?>
                            </tbody>
                          </table>

                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-3 col-xs-offset-6 ">
                          <h4>Delivered by</h4>
                          <br> <br> <br>
                          <p><b>(<?php echo $data['pengirim'] ?>)</b></p>                          
                        </div>
                        <div class="col-xs-3">
                          <h4>Recieved by</h4>
                          <br> <br> <br>
                          <p><b>(..............................)</b></p> 
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      
                    </section>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="x_panel">
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
                          <h3>
                              <img class="" src="images/logo_tnd.png" class="img-circle profile_img"> Surat Jalan
                              <small class="pull-right">Lampiran 3: Finance</small><br>
                              <small class="pull-right">No : <?php echo $data['no_surat'] ?></small><br>
                            <small class="pull-right">Tgl: <?php $format1 = $tanggal = $data['tgl_kirim']; echo date('d-m-Y', strtotime($tanggal));  ?></small>
                          </h3>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h3> 
                          </h3>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <br>
                      <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                          From :
                          <address>
                                          <strong><?php echo $data['pengirim'] ?></strong><br>
                                          IT
                                          <br><?php echo $data['email'] ?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
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
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <td><?php echo $row[3] ?></td>
                                <td><?php echo $row[4] ?></td>
                              </tr>

                          <?php $no++;} ?>
                            </tbody>
                          </table>

                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-3 col-xs-offset-6 ">
                          <h4>Delivered by</h4>
                          <br> <br> <br>
                          <p><b>(<?php echo $data['pengirim'] ?>)</b></p>                          
                        </div>
                        <div class="col-xs-3">
                          <h4>Recieved by</h4>
                          <br> <br> <br>
                          <p><b>(..............................)</b></p> 
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      
                    </section>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

      </div>
    </div>

   <?php defaultQuery(); ?>

    <?php
      echo
      "<script>
      window.print();
      </script>";
      ?>
 
  </body>
</html>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>