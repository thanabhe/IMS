<?php 
  session_start();
   if (isset($_SESSION['username'])) {  

  include_once 'connect.php';
  include 'template.php';
 
  publicHeader();

?>

        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">COMING SOON</h1>
                <h2>We Will Be Back On Update</h2>
              </p>
              <div class="mid_center">
                <h3><a href="index.php">Home</a></h3>
                <form>
                  <div class="col-xs-12 form-group pull-right top_search"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
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