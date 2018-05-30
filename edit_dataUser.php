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
                <h3>Edit User</h3>
              </div>

            </div>

            <div class="clearfix"></div>

             <div class="row">

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Edit User</small></h2>
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
                    <form id="demo-form2" action="proses_editUser.php?id=<?php echo $_GET['id']; ?>" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    
                    <?php 
                      $username = $_GET['id'];
                      $query = $mysqli->query("SELECT * from user where username = '$username'");
                      $data = $query->fetch_array();

                    ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" id="first-name" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['username']; ?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" id="first-name" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nama']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="email" id="first-name" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $data['email']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">                          
                          <select type="text"  name="level" required="required" class="chosen-select">
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                          </select>
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

                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Reset Password</small></h2>
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
                    <form id="demo-form2" action="proses_resetPass.php?id=<?php echo $_GET['id']; ?>" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    
                    <?php 
                      $username = $_GET['id'];
                      $query = $mysqli->query("SELECT * from user where username = '$username'");
                      $data = $query->fetch_array();

                    ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="text" id="first-name" name="username" readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $data['password']; ?>" >
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
    <script src="vendors/chosen/chosen.jquery.js"></script>  
  <script>
        $(function() {
          $('.chosen-select').chosen();
          $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        });
      </script>

  </body>
</html>

<?php
    }else{
    die("<script language='javascript'>alert('Silahkan Login Terlebih dahulu!'); document.location='login.php';</script>"); 
    }
    
?>
