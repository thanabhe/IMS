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
                <h3>Form Pengiriman</h3>
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
                    <form id="demo-form2" action="proses_sementara.php" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    
                    
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
                          <input type="number" id="first-name" name="qty" required="required" class="form-control col-md-7 col-xs-12">
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
                          <td><a href="delete_dtsementara.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash" ><i></i></span></a></td>
                        </tr>

                        <?php $no++;} ?>
                      </tbody>
                    </table>
                      

                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>QR Code </small></h2>
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
                    
                    <?php  
                          $id = $_GET['id'];
                          $result = $mysqli->query("SELECT * from detailbarang where id='$id'");
                          while ( $row = $result -> fetch_array()) {
                        ?>
                        <img src="temp/<?php echo $row['files'] ?>">
                    <?php } ?>
                    <br>
                    <a href="" class="btn">Download</a>
                    
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

  </body>
</html>



<?php
    }else{
    header("location:login.php");
      die();
    }
    
?>