<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/playstore.png">
    <title>Welcome SL App Store</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->

    <link rel="stylesheet" type="text/css" href="assets/css/star-rating-svg.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
  
    


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <?php

      $latest="Latest apps";
      $games="games";
      $popular="Popular apps";
      $educational="educational apps";

      $_SESSION['varname']="";

    ?>
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
          <div class="main_container">
            <h3>Recomended Apps</h3>
            <div class="row mt">
              <div class="col-lg-12">
                <div class="app_container">



                  <?php
                  $sql = "SELECT application.*,app_rate.* FROM application INNER JOIN app_rate ON application.app_id=app_rate.app_id WHERE application.recomend='recomend' and application.status='approved' LIMIT 9";

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {  ?>
                          <a href="app/appdetails.php?app_id=<?php echo $row['app_id']; ?>">
                              <?php
                                include 'include/app_inc.php';
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
            </div>
          </div>
          
          <div class="main_container">
            <h3>Recomended Developers</h3>
            <div class="row mt">
              <div class="col-lg-12">
                <div class="app_container">

                  <?php
                  include 'config/db_connection.php';

                  $sql = "SELECT developer.*,dev_contact.* FROM developer INNER JOIN dev_contact ON developer.dev_id=dev_contact.dev_id WHERE developer.status='approved' and developer.recomend='recomend'";

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) { ?>
                            <a href="developer/devdetails.php?detail_dev_id=<?php echo $row['dev_id']; ?>">
                             <?php
                                include 'include/dev_inc.php';
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
            </div>
          </div>

          <div class="main_container">
            <h4>
              <a href="app.php?app_name=<?php echo $latest; ?>" ><?php echo $latest;?></a>
            </h4>
            <div class="row mt">
              <div class="col-lg-12">
                <div class="app_container">
                  
                  <?php
                  $sql = "SELECT application.*,app_rate.* FROM application INNER JOIN app_rate ON application.app_id=app_rate.app_id WHERE application.status='approved' ORDER BY application.app_id  DESC LIMIT 9";

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {  ?>
                          <a href="app/appdetails.php?app_id=<?php echo $row['app_id']; ?>">
                              <?php
                                include 'include/app_inc.php';
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
            </div>
          </div>
          <div class="main_container">
            <h4>
              <a href="appcategory.php?app_category=<?php echo $games; ?>" ><?php echo $games;?></a>
            </h4>
            <div class="row mt">
              <div class="col-lg-12">
                <div class="app_container">
                  
                  <?php
                  $sql = "SELECT application.*,app_rate.* FROM application INNER JOIN app_rate ON application.app_id=app_rate.app_id WHERE application.category='games' and application.status='approved' LIMIT 9";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {  ?>
                          <a href="app/appdetails.php?app_id=<?php echo $row['app_id']; ?>">
                              <?php
                                include 'include/app_inc.php';
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
            </div>
          </div>
          
          <div class="main_container">
            <h4>
              <a href="app.php?app_name=<?php echo $popular; ?>" ><?php echo $popular;?></a>
            </h4>
            <div class="row mt">
              <div class="col-lg-12">
                <div class="app_container">
                  <?php
                  $sql = "SELECT application.*,app_rate.* FROM application INNER JOIN app_rate ON application.app_id=app_rate.app_id WHERE application.status='approved' ORDER BY application.views DESC LIMIT 9";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {  ?>
                          <a href="app/appdetails.php?app_id=<?php echo $row['app_id']; ?>">
                              <?php
                                include 'include/app_inc.php';
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
            </div>
          </div>

          <div class="main_container">
            <h4>Java Developers</h4>
            <div class="row mt">
              <div class="col-lg-12">
                <div class="app_container">

                  <?php
                  include 'config/db_connection.php';

                  $sql = "SELECT developer.*,dev_contact.*,dev_skill.* from developer inner join  dev_contact on  developer.dev_id=dev_contact.dev_id inner join dev_skill on developer.dev_id=dev_skill.dev_id where dev_skill.skill_1='web developer' or dev_skill.skill_2='web developer' or dev_skill.skill_3='web developer' or dev_skill.skill_4='web developer' or dev_skill.skill_5='web developer' or dev_skill.skill_6='web developer' or dev_skill.skill_7='web developer' or dev_skill.skill_8='web developer' and developer.status='approved'";

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) { ?>
                            <a href="developer/devdetails.php?detail_dev_id=<?php echo $row['dev_id']; ?>">
                             <?php
                                include 'include/dev_inc.php';
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
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  
  
  <script src="assets/js/jquery.star-rating-svg.min.js"></script>
  
  </body>
</html>
