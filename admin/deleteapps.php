<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="icon" type="image/png" href="../images/playstore.png">
    <title>Admin dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php

      session_start();
      include '../config/db_connection.php';

      if(!isset($_SESSION['admin_id'])){
        header("Location:index.php");
      }

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
          <section class="wrapper">
            
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">

                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Remove Applications</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> app name</th>
                                  <th><i class="fa fa-question-circle"></i> dev id</th>
                                  <th><i class=" fa fa-edit"></i> os</th>
                                  <th><i class=" fa fa-edit"></i> price</th>
                                  <th><i class=" fa fa-edit"></i> url</th>
                                  <th><i class=" fa fa-edit"></i> Remove</th>
                                  
                              </tr>
                              </thead>
                              <tbody>

                                <?php
                                $sql = "SELECT * FROM application LIMIT 30";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {?>
                                        
                                        <tr>
                                          <td><a href="basic_table.html#"><?php echo $row['app_name']; ?></a></td>
                                          <td><?php echo $row['dev_id']; ?></td>
                                          <td><?php echo $row['os']; ?></td>
                                          <td><?php echo $row['price']; ?></td>
                                          <td><?php echo $row['app_url']; ?></td>
                                          <td>

                                              <form action="../scripts/deleteapp.php?app_id=<?php echo $row['app_id']; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times "></i></button>
                                              </form>

                                          </td>
                                          
                                      </tr>
                                <?php
                          
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>



                              
                              </tbody>
                          </table>


                      </div><!-- /content-panel -->



                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
              

    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php include 'include/footer.php'; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/js/chart-master/Chart.js"></script>
    <script src="../assets/js/chartjs-conf.js"></script>
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
