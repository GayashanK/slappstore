<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php 

      $varname=$_GET['skill'];

    ?>
    <?php
        session_start();
        include 'config/db_connection.php';

        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $dev_id='';

        $sql = "SELECT * FROM developer WHERE user_id='$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $dev_id=$row["dev_id"];
            }
        } else {
            
        }
        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $first_name=$row["first_name"];
            }
        } else {
    
        }
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="icon" type="image/png" href="images/playstore.png">
    <title><?php echo $varname; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
        <?php include 'include/header.php'; ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
         <?php include 'include/slider.php'; ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h4><i class="fa fa-angle-right"></i> <?php echo $varname; ?> </h4>
          	<div class="row mt">
          		<div class="col-lg-12">

                  <?php

                  include 'config/db_connection.php';

                  $sql = "SELECT developer.*,dev_contact.*,dev_skill.* from developer inner join  dev_contact on  developer.dev_id=dev_contact.dev_id inner join dev_skill on developer.dev_id=dev_skill.dev_id where dev_skill.skill_1='$varname' or dev_skill.skill_2='$varname' or dev_skill.skill_3='$varname' or dev_skill.skill_4='$varname' or dev_skill.skill_5='$varname' or dev_skill.skill_6='$varname' or dev_skill.skill_7='$varname' or dev_skill.skill_8='$varname' and developer.status='approved' ;";

                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) { ?>
                            <a href="developer/devdetails.php?detail_dev_id=<?php echo $row['dev_id']; ?>">
                             <?php
                                include 'include/devs_inc.php';
                            ?>
                          </a>
                  <?php
                      }
                  } else {
                      echo "0 results";
                  }
                  ?>        
          		
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php include 'include/footer.php'; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
 
  </body>
</html>
