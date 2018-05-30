<?php 


function publicHeader(){

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MAXX-IMS</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Jquery-UI -->
    <link href="vendors/jquery-ui/jquery-ui.css" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>	 
<?php 
  } function indexBody(){
?>
  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="images/logo_tnd.png" alt="..."></i> <span>MAXXIMS</span></a>
            </div>

            <div class="clearfix"></div>
<?php 
	} function publicBody(){
?>
	<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="images/logo_tnd.png" alt="..."></i> <span>MAXXIMS</span></a>
            </div>

            <div class="clearfix"></div>
<?php
	} function profile(){
?>
	
    <br />

<?php 
  } function menuAdmin(){
?>
  <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="data_barang.php"><i class="fa fa-cubes"></i> Barang <span class="fa fa-chevron-down"></span></a></li>
                  <li><a><i class="fa fa-truck"></i>Transaksi<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="barang_masuk.php">Barang Masuk</a></li>
                      <li><a href="barang_keluar.php">Barang Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i>Users<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="data_user.php">Data User</a></li>
                      <li><a href="input_user.php">Input User</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

      </div>
           </div>
          </div>

            <!-- /sidebar menu -->
<?php 
	} function menuStaff(){
?>

<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a></li>
                  <li><a><i class="fa fa-cubes"></i> Barang <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      <li><a href="data_barang.php">Data Barang</a></li>
                      <li><a href="detail_barang.php">Detail Barang</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-truck"></i>Transaksi<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Barang Masuk<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li class="sub_menu"><a href="barang_masuk.php">Barang Masuk</a>
                          </li>
                          <li><a href="search_masuk.php">Search Transaksi Masuk</a>
                          </li>
                        </ul>
                      </li>
                      <li><a>Barang keluar<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li class="sub_menu"><a href="barang_keluar.php">Barang Keluar</a>
                          </li>
                          <li><a href="search_keluar.php">Search Transaksi Keluar</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>

			</div>
           </div>
          </div>

            <!-- /sidebar menu -->
<?php 
	} function topBar(){
?>
	<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['nama']; ?>	
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="comingsoon.php"> Profile</a></li>
                    <li>
                      <a href="change_password.php">Change Password</a>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

	
<?php 
  }function defaultQuery(){
?>

<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
      <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>   

<?php 
  } function footer(){
?>

      <!-- footer content -->
        <footer>
          <div class="pull-right">
           @2017 MAXX COFFEE || <a href="index.php">Inventory Management System</a>
          </div>
          <div class="clearfix"></div>
        </footer>
<?php } function loginFooter(){ ?>

        <div>
          <h1> Inventory Management System</h1>
          @2017 MAXX COFFEE
        </div>
<?php } ?>