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
                <h3>Change Password</h3>
              </div>

            </div>

            <div class="clearfix"></div>

             <div class="row">

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2></small></h2>
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
                    <form id="demo-form2" action="proses_changePass.php" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old Password <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="password" id="first-name" name="old_pass" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="password" id="first-name" name="new_pass" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>               
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12"> 
                          <input type="password" id="first-name" name="conf_pass" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <td style="text-align:center">  
                            <?php
                              $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                            ?>                        
                            <a href="<?=$url?>" class="btn btn-danger"  title="Back">Cancel </a>
                          </td>                        
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
    header("location:login.php");
      die();
    }
    
?>
